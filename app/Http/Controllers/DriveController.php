<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Exception;
use Google\Service\Drive;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class DriveController extends Controller
{
    public function subirArchivo($archivo, $nombre, $idCarpeta)
    {
        //return($archivo);                                                //Subiendo el archivo al servidor
        // Obtener el archivo subido
        $rutaTemporal = $archivo->getPathname(); // Ruta temporal del archivo
        $nombreArchivo = $nombre; // Nombre del archivo

        // Llamar a la función para subir a Google Drive
        $descripcion = "Prohibida la distribucion";
        return ($this->subirDocumentoDrive($rutaTemporal, $nombreArchivo, $descripcion, $idCarpeta));

        //return back()->with('mensaje', 'Archivo subido exitosamente a Google Drive.');
    }

    private function subirDocumentoDrive($rutaTemporal, $nombreArchivo, $descripcion, $idCarpeta)  //Subiendo el archivo a drive
    {
        // Aquí va tu código para subir el archivo a Google Drive
        $claveJSON = $idCarpeta;
        $pathJSON = storage_path('app\credentials\storageid-07a73687097e.json'); // Ruta en Laravel

        // Configurar variable de entorno
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $pathJSON);

        $client = new \Google\Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);

        try {
            $service = new \Google\Service\Drive($client); //instancia del servicio

            $file = new \Google\Service\Drive\DriveFile();  //Instancia del archivo
            $file->setName($nombreArchivo);

            $finfo = finfo_open(FILEINFO_MIME_TYPE);        //Obtener el mime type
            $mime_type = finfo_file($finfo, $rutaTemporal);

            $file->setParents([$claveJSON]);            //id de carpeta donde tengo el prermiso de subir
            $file->setDescription($descripcion);
            $file->setMimeType($mime_type);

            $result = $service->files->create(
                $file,
                [
                    'data' => file_get_contents($rutaTemporal),
                    'mimeType' => $mime_type,
                    'uploadType' => 'media',
                ]
            );  //Fichero se sube a drive

            return ("Archivo subido exitosamente.");
        } catch (\Google\Service\Exception $gs) {
            $m = json_decode($gs->getMessage());
            return $m->error->message;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function descargaINE($linea)
    {
        $client = new \Google_Client();
        $client->setAuthConfig(storage_path('app\credentials\storageid-07a73687097e.json')); // Ruta a tus credenciales
        $client->addScope(Drive::DRIVE_READONLY);

        $service = new Drive($client);
        //$service = new Drive($client);
        $files = $service->files->listFiles([
            'q' => "(name='{$linea}_anverso_INE' or name='{$linea}_reverso_INE') and trashed=false",
            'fields' => 'files(id, name)'
        ]);

        $fileList = $files->getFiles();

        if (count($fileList) > 0) {
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            foreach ($fileList as $file) {
                $fileId = $file->getId();
                $fileName = $file->getName();

                $response = $service->files->get($fileId, ['alt' => 'media']);
                $content = $response->getBody()->getContents();

                // Guardar la imagen temporalmente
                $tempFilePath = storage_path('temp\ ' . $fileName . '.png');
                file_put_contents($tempFilePath, $content);

                // Añadir la imagen al documento
                $section->addImage($tempFilePath, [
                    'width' => 486,  // Ajusta el tamaño de la imagen según sea necesario
                    'height' => 291,
                ]);

                
            }
            // Guardar el archivo .docx
            $path = $linea . "identificación.docx";
            $docxFilePath = storage_path($path);
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($docxFilePath);
            foreach ($fileList as $file) {
                $fileName = $file->getName();
                $tempFilePath = storage_path('temp\ ' . $fileName . '.png');
                unlink($tempFilePath);
            }
            // Descargar el archivo .docx
            return response()->download($docxFilePath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Files not found'], 404);
        }
    }
}
