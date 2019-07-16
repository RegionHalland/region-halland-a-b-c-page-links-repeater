# Funktion för att skapa abc-länk-listor + hämta ut i front-end

## Hur man använder Region Hallands plugin "region-halland-a-b-c-page-links-repeater"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-a-b-c-page-links-repeater".


## Användningsområde

Denna plugin skapar en sidmall med namn "abc-lista" som sedan kan visa länklistor.


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-a-b-c-page-links-repeater/blob/master/LICENSE)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-a-b-c-page-links-repeater.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-a-b-c-page-links-repeater.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-a-b-c-page-links-repeater": "1.0.0"
},
```


## Loopa ut alla använda bokstäver och skapa ankarlänk via "Blade"

```sh
@php($myLinks = get_region_halland_acf_abc_page_links())  
@if(isset($myLinks['letters']))
  @foreach ($myLinks['letters'] as $link)
    <a href="http://exempel.se/min-sida/#{{ $link['start_letter'] }}">{{ $link['start_letter'] }}</a>
  @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=6)
  0 => 
    array (size=2)
      'start_letter' => string 'a' (length=1)
      'start_letter_u' => string 'A' (length=1)
  1 => 
    array (size=2)
      'start_letter' => string 'b' (length=1)
      'start_letter_u' => string 'B' (length=1)
  2 => 
    array (size=2)
      'start_letter' => string 'e' (length=1)
      'start_letter_u' => string 'E' (length=1)
  3 => 
    array (size=2)
      'start_letter' => string 'k' (length=1)
      'start_letter_u' => string 'K' (length=1)
  4 => 
    array (size=2)
      'start_letter' => string 's' (length=1)
      'start_letter_u' => string 'S' (length=1)
  5 => 
    array (size=2)
      'start_letter' => string 'u' (length=1)
      'start_letter_u' => string 'U' (length=1)
```


## Loopa ut alla bokstäver och skapa ankarlänk för de som har innehåll via "Blade"

```sh
@php($myLinks = get_region_halland_acf_abc_page_links())  
@if(isset($myLinks['allLetters']))
  @foreach ($myLinks['allLetters'] as $link)
    @if($link['has_content'] == 1)
    <a href="http://exempel.se/min-sida/#{{ $link['start_letter'] }}">{{ $link['start_letter'] }}</a>
    @else
    <span>{{ $link['start_letter_u'] }}</span>
    @endif
  @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=28)
  0 => 
    array (size=3)
      'start_letter' => string 'a' (length=1)
      'start_letter_u' => string 'A' (length=1)
      'has_content' => int 1
  1 => 
    array (size=3)
      'start_letter' => string 'b' (length=1)
      'start_letter_u' => string 'B' (length=1)
      'has_content' => int 1
  2 => 
    array (size=3)
      'start_letter' => string 'c' (length=1)
      'start_letter_u' => string 'C' (length=1)
      'has_content' => int 0
  3 => 
    array (size=3)
      'start_letter' => string 'd' (length=1)
      'start_letter_u' => string 'D' (length=1)
      'has_content' => int 0
  4 => 
    array (size=3)
      'start_letter' => string 'e' (length=1)
      'start_letter_u' => string 'E' (length=1)
      'has_content' => int 1
  5 => 
    array (size=3)
      'start_letter' => string 'f' (length=1)
      'start_letter_u' => string 'F' (length=1)
      'has_content' => int 0
  6 => 
    array (size=3)
      'start_letter' => string 'g' (length=1)
      'start_letter_u' => string 'G' (length=1)
      'has_content' => int 0
  7 => 
    array (size=3)
      'start_letter' => string 'h' (length=1)
      'start_letter_u' => string 'H' (length=1)
      'has_content' => int 0
  8 => 
    array (size=3)
      'start_letter' => string 'i' (length=1)
      'start_letter_u' => string 'I' (length=1)
      'has_content' => int 0
  9 => 
    array (size=3)
      'start_letter' => string 'j' (length=1)
      'start_letter_u' => string 'J' (length=1)
      'has_content' => int 0
  10 => 
    array (size=3)
      'start_letter' => string 'k' (length=1)
      'start_letter_u' => string 'K' (length=1)
      'has_content' => int 1
  11 => 
    array (size=3)
      'start_letter' => string 'l' (length=1)
      'start_letter_u' => string 'L' (length=1)
      'has_content' => int 0
  12 => 
    array (size=3)
      'start_letter' => string 'm' (length=1)
      'start_letter_u' => string 'M' (length=1)
      'has_content' => int 0
  13 => 
    array (size=3)
      'start_letter' => string 'n' (length=1)
      'start_letter_u' => string 'N' (length=1)
      'has_content' => int 0
  14 => 
    array (size=3)
      'start_letter' => string 'o' (length=1)
      'start_letter_u' => string 'O' (length=1)
      'has_content' => int 0
  15 => 
    array (size=3)
      'start_letter' => string 'p' (length=1)
      'start_letter_u' => string 'P' (length=1)
      'has_content' => int 0
  16 => 
    array (size=3)
      'start_letter' => string 'q' (length=1)
      'start_letter_u' => string 'Q' (length=1)
      'has_content' => int 0
  17 => 
    array (size=3)
      'start_letter' => string 'r' (length=1)
      'start_letter_u' => string 'R' (length=1)
      'has_content' => int 0
  18 => 
    array (size=3)
      'start_letter' => string 's' (length=1)
      'start_letter_u' => string 'S' (length=1)
      'has_content' => int 1
  19 => 
    array (size=3)
      'start_letter' => string 't' (length=1)
      'start_letter_u' => string 'T' (length=1)
      'has_content' => int 0
  20 => 
    array (size=3)
      'start_letter' => string 'u' (length=1)
      'start_letter_u' => string 'U' (length=1)
      'has_content' => int 1
  21 => 
    array (size=3)
      'start_letter' => string 'v' (length=1)
      'start_letter_u' => string 'V' (length=1)
      'has_content' => int 0
  22 => 
    array (size=3)
      'start_letter' => string 'x' (length=1)
      'start_letter_u' => string 'X' (length=1)
      'has_content' => int 0
  23 => 
    array (size=3)
      'start_letter' => string 'y' (length=1)
      'start_letter_u' => string 'Y' (length=1)
      'has_content' => int 0
  24 => 
    array (size=3)
      'start_letter' => string 'z' (length=1)
      'start_letter_u' => string 'Z' (length=1)
      'has_content' => int 0
  25 => 
    array (size=3)
      'start_letter' => string 'å' (length=2)
      'start_letter_u' => string 'å' (length=2)
      'has_content' => int 0
  26 => 
    array (size=3)
      'start_letter' => string 'ä' (length=2)
      'start_letter_u' => string 'ä' (length=2)
      'has_content' => int 0
  27 => 
    array (size=3)
      'start_letter' => string 'ö' (length=2)
      'start_letter_u' => string 'ö' (length=2)
      'has_content' => int 0
```


## Loopa ut alla länkar på sidan via "Blade"

```sh
@php($myLinks = get_region_halland_acf_abc_page_links())  
@if(isset($myLinks['content']))
  @foreach ($myLinks['content'] as $link)
    @if($link['has_anchor_link'] == 1)
       <a name="{{ $link['start_letter'] }}">{{ $link['start_letter_u'] }}</a><br>
    @endif
    <a href="{{ $link['link_url'] }}" target="{{ $link['link_target'] }}">{{ $link['link_title'] }}</a><br>
  @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=8)
  0 => 
    array (size=6)
      'link_title' => string 'Aaa till energi' (length=15)
      'link_url' => string 'http://exempel.se/utveckling-och-tillvaxt/miljo-energi-och-klimat/energikontoret/' (length=81)
      'link_target' => string '' (length=0)
      'start_letter' => string 'a' (length=1)
      'start_letter_u' => string 'A' (length=1)
      'has_anchor_link' => int 1
  1 => 
    array (size=6)
      'link_title' => string 'Aftonbladet' (length=11)
      'link_url' => string 'http://www.aftonbladet.se' (length=25)
      'link_target' => string '_blank' (length=6)
      'start_letter' => string '' (length=0)
      'start_letter_u' => string '' (length=0)
      'has_anchor_link' => int 0
  2 => 
    array (size=6)
      'link_title' => string 'Barndans' (length=8)
      'link_url' => string 'http://exempel.se/vara-skolor/loftadalens-folkhogskola/kurs-och-konferens/korta-kurser/kvallskurser/barndans/' (length=109)
      'link_target' => string '' (length=0)
      'start_letter' => string 'b' (length=1)
      'start_letter_u' => string 'B' (length=1)
      'has_anchor_link' => int 1
  3 => 
    array (size=6)
      'link_title' => string 'Energiråd' (length=10)
      'link_url' => string 'http://exempel.se/utveckling-och-tillvaxt/miljo-energi-och-klimat/energikontoret/energirad-for-foretag/' (length=103)
      'link_target' => string '' (length=0)
      'start_letter' => string 'e' (length=1)
      'start_letter_u' => string 'E' (length=1)
      'has_anchor_link' => int 1
  4 => 
    array (size=6)
      'link_title' => string 'Konferens' (length=9)
      'link_url' => string 'http://exempel.se/vara-skolor/loftadalens-folkhogskola/kurs-och-konferens/konferens/' (length=84)
      'link_target' => string '' (length=0)
      'start_letter' => string 'k' (length=1)
      'start_letter_u' => string 'K' (length=1)
      'has_anchor_link' => int 1
  5 => 
    array (size=6)
      'link_title' => string 'Samhällsplanering' (length=18)
      'link_url' => string 'http://exempel.se/om-region-halland/statistik-och-analys/samhallsplanering/' (length=75)
      'link_target' => string '' (length=0)
      'start_letter' => string 's' (length=1)
      'start_letter_u' => string 'S' (length=1)
      'has_anchor_link' => int 1
  6 => 
    array (size=6)
      'link_title' => string 'Skola och utbildning' (length=20)
      'link_url' => string 'http://exempel.se/om-region-halland/statistik-och-analys/skola-2/' (length=65)
      'link_target' => string '' (length=0)
      'start_letter' => string '' (length=0)
      'start_letter_u' => string '' (length=0)
      'has_anchor_link' => int 0
  7 => 
    array (size=6)
      'link_title' => string 'Utveckling' (length=10)
      'link_url' => string 'http://exempel.se/utveckling-och-tillvaxt/' (length=42)
      'link_target' => string '' (length=0)
      'start_letter' => string 'u' (length=1)
      'start_letter_u' => string 'U' (length=1)
      'has_anchor_link' => int 1
```


## Versionhistorik

### 1.3.0
- Korrigerat länk till licens-fil

### 1.2.0
- Bifogat fil med licensmodell

### 1.1.0
- Lagt till information om licensmodell

### 1.0.2
- Fel variabelnamn i bokstavs-loop åtgärdat

### 1.0.1
- Justerat så att åäö fungerar

### 1.0.0
- Första version