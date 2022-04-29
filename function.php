<?php

function formatDate($originalDate){
    
    //original date is in format YYYY-mm-dd
    $DateTime = DateTime::createFromFormat('Y-m-d', $originalDate);
    $newDate = $DateTime->format('d F Y');
    return $newDate;
    }
    
    
    
    function truncateText(string $text,int $chars): string {
        if (strlen($text) <= $chars) {
            return $text;
        }
        $text = $text." ";
        $text = substr($text,0,$chars);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";
        return $text;
    }
    