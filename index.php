<?php 
include('inc/head.php');

$nomDossierRacine = 'files'; 
$cheminRacine = __DIR__ . '/' . $nomDossierRacine;

function arborescence($cheminDossier) {
    if (!is_dir($cheminDossier)) return '';

    $html = '<ul class="arbre">';
    $elements = scandir($cheminDossier);

    foreach ($elements as $element) {
        if ($element === '.' || $element === '..') continue;

        $cheminComplet = $cheminDossier . '/' . $element;

        if (is_dir($cheminComplet)) {

            $html .= '<li class="dossier">';
            $html .= '<details>';
            $html .= '<summary><strong>[Dossier]</strong> ' . htmlspecialchars($element) . '  ' . '<a href="delete.php?q=' . $cheminDossier . '/' . htmlspecialchars($element) . '">delete</a></summary>';
            $html .= arborescence($cheminComplet);
            $html .= '</details>';
            $html .= '</li>';
        } else {

            $html .= '<li class="fichier">[Fichier] ' . htmlspecialchars($element) . '  ' . '<a href="edit.php?q=' . $cheminDossier . '/' . htmlspecialchars($element) . '">edit</a>' . '  ' . '<a href="delete.php?q=' . $cheminDossier . '/' . htmlspecialchars($element) . '">delete</a></li>';
        }
    }
    $html .= '</ul>';
    return $html;
}

if (is_dir($cheminRacine)) {
    echo arborescence($cheminRacine);
} else {
    echo '<p style="color:red;">Erreur : Le dossier "' . htmlspecialchars($nomDossierRacine) . '" est introuvable.</p>';
}

include('inc/foot.php'); 
?>