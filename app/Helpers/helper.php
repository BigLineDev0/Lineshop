<?php

function formatDevise($montant)
{
    return number_format($montant, 0, ',', ' ') . ' Fcfa';
}