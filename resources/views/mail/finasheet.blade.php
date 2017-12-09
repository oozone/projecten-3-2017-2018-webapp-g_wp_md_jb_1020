@component('mail::message')

# FINA-sheet

Beste,

De match {{$match->home->name}} - {{$match->visitor->name}} werd afgetekend, u kunt nu het FINA-sheet downloaden hieronder.

## Match-gegevens
*{{$match->home->name}} - {{$match->visitor->name}}*

Eindstand: {{$match->score_home}} - {{$match->score_visitor}}

Plaats: {{$match->location->name }}

Referee: {{ $referee->name }}

@component('mail::button', ['url' => 'http://voom.be:12005/pdf/' . $match->finasheet ])
Downloaden
@endcomponent

Met vriendelijke groeten,
*Waterpolo Team*
@endcomponent
