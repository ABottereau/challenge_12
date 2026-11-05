<?php
include('config/constantes.php');

function viderDossier(string $dossier) {
    if (str_starts_with($dossier, DOSSIERPROJET)) {
        if(!str_contains($dossier, '..')) {
            if (!is_dir($dossier)) {
                @unlink($dossier);
                return;
            }
        
            $objets = scandir($dossier);
            foreach ($objets as $objet) {
                if ($objet != "." && $objet != "..") {
                    $chemin = $dossier . "/" . $objet;
                    if (is_dir($chemin)) {
                        viderDossier($chemin);
                        @rmdir($chemin);
                    } else {
                        @unlink($chemin);
                    }
                }
            }
        @rmdir($_GET['q']);
        } else return;
    } else return;
}

viderDossier($_GET['q']);

header('Location: index.php');
exit;