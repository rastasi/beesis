<?php

//Ez a f�jl tartalmazza a BeeSis rendszer be�ll�t�sait.


// A BeeSis �ltal haszn�lt adminisztr�ci�s jelsz�
$adminpass = 'cicus';

// Az alap�rtelmezett st�luslap. A v�laszt�k a 'styles' k�nyvt�rban tal�lhat�.
$style = 'style.css';

// A c�msorban �s a fejl�cben megjelen�tend� c�m
$cim = "Babylon's System Corporation";

// A MySQL adatb�zis-szerver neve
$bazis_host = 'localhost';

// Felhaszn�l�n�v a MySQL Adatb�zishoz
$bazis_user = 'root';

// A felaszn�l�n�vhez tartoz� jelsz�.
$bazis_jelszo ='toor';

// Az atatb�zis-szerveren bel�l haszn�land� adatb�zis neve.
$bazis_nev = 'bsys_forum';

// Itt adhatod meg hogy ha a bejelentkezett felhaszn�l� nem haszn�lja f�rumot, h�ny m�sodperc ut�n szedje ki a rendszer az Online Felhaszn�l�k list�j�b�l.
$online_limit = 60;

//Egy oldalon egyszerre megjelen�tett hozz�sz�l�sok sz�ma.
$pagelimit = 10;

// A BeeSis rendszeren bel�l �rv�nyes h�zirend. Amennyiben egy felhaszn�l� ezt megs�rti, aj�nlatos a t�r�lni a rendszerb�l. (A ' jel haszn�lata szintaktikai hib�t okoz, k�rlek mell�zd)
$manual = '
K�rlek figyelmesen olvasd el ezt a szab�lyzatot, a k�s�bbi gondok elker�l�s�nek �rdek�ben.
Az oldalon tiltott minden agresszi�t kiv�lt�, s�t�nista, rasszista vagy fasiszta t�ma �s al��r�s.
Hungarist�k k�m�ljenek.
';

?>