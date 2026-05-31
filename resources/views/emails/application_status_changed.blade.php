<p>Bonjour {{ $application->full_name }},</p>
<p>Votre candidature pour : <strong>{{ $application->training->title }}</strong> a été mise à jour.</p>

<p>Nouveau statut :
    <strong>
        @if($application->status==='accepted') Acceptée
        @elseif($application->status==='rejected') Refusée
        @else En attente
        @endif
    </strong>
</p>

@if($application->notes_admin)
<p>Message : {{ $application->notes_admin }}</p>
@endif
