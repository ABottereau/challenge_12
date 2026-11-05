<?php

function viderDossier(string $dossier) {
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
}

viderDossier($_GET['q']);

header('Location: index.php');
exit;