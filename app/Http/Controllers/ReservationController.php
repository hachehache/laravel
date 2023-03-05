<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Controllers;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //creation d'une fonction
    public function index()
    {
        // on est dans la partie front
        // le client ne verra pas les autres réservations
        return view('reservation', [
        ]);

    }

    //cette methode affiche un formulaire de création de réservation
    //public function create()//
    public function create()
    {
        //valeur par default afficher avant modif par le restaurateur
        // ne pas appeler de save
        $reservation = new stdClass;
        
        $reservation->nom =  '';
        $reservation->prenom =  '';
        $reservation->jour = '';
        $reservation->heure = '20:00';
        $reservation->nombre_personnes = 2;
        $reservation->tel = '';
        $reservation->email = '';

        //Recuperation des créneaux horaires de réservation
        $creneaux_horaires = $this->getCreneauxHoraires();
       
        // transmission des valeurs par défaut à la vue
        return view('admin.reservation.create', [
            'reservation' => $reservation,
            'creneaux_horaires' =>  $creneaux_horaires,
         
        ]);
    }
    
    //cette methode enregistre les données d'une nouvelle reservation dans la base de données 
    public function store(Request $request)
    {
        /*verif avant d'enregistrer les info utilisateurs */
    $validated = $request->validate([
        /* nombre mini et max de caracteres, 
        voir migration creat*reservation_table pour le max de caracteres*/
        //pour l'update,on devalide l'enregistrement du nom dans la base car on a ajouté readonly 
        //dans resource\vue\admin\edit.blade.php. evite effacement accidentelle du nom
        //'nom' => 'required|min:2|max:100',
        'nom' => 'required|min:2|max:100',
        'prenom' => 'required|min:2|max:100',
        //'jour' => 'required|date|date_format:Y-m-d|after_or_equal:today',//
        'jour' => 'required|date|after_or_equal:today',
        'heure' => 'required|date_format:H:i',
        /*gte: + grand ou =1 , lte: +petit ou = à 20 */
        'nombre_personnes'=> 'required|numeric|gte:1|lte:20',
        'tel' => 'required|regex:/^[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2}$/',
        'email' => 'required|email:rfc,dns',
    ]);

    /* Création d'une reservation*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $reservation = new Reservation();

    $reservation->nom = $request->get('nom');
    $reservation->prenom = $request->get('prenom');
    $reservation->jour = $request->get('jour');
    $reservation->heure = $request->get('heure');
    $reservation->nombre_personnes = $request->get('nombre_personnes');
    $reservation->tel = $request->get('tel');
    $reservation->email = $request->get('email');
    $reservation->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'La création a bien été enregistré.');

    /* on redirige l'utilisateur vers  la page liste */
    return redirect()->route('admin.reservation.index');
    }

    
    private function getCreneauxHoraires()
    {
       // @todo récupérer les créneaux horaires de la table restaurant en utilsant une clé

        // au lieu d'écrire les horaires en dur dans un contrôleur, il faut stocker ces données dans 
        // la table 'restaurant' en utilisant une clé ('creneaux_horaires' par exemple)
        // alors vous pourrez récupérer les créneaux horaires en utilisant la clé, 
        // comme dans la page contact
        $creneaux_horaires_str = "
            12:00
            12:15
            12:30
            12:45

            13:00
            13:15
            13:30
            13:45

            19:00
            19:15
            19:30
            19:45

            20:00
            20:15
            20:30
            20:45

            21:00
            21:15
            21:30
            21:45

            22:00
            22:15
            22:30
            22:45

            23:00
        ";

        // créé un tableau à partir de la chaîne de caractères
        $creneaux_horaires = preg_split("/[\s]+/", $creneaux_horaires_str);
        // supprime les lignes vides
        $creneaux_horaires = array_filter($creneaux_horaires, function($value) {
            return empty($value) ? false : true;
        });
        // réindexe le tableau (nécessaire car nous avons supprimer les lignes vides)
        $creneaux_horaires = array_values($creneaux_horaires);

        return $creneaux_horaires;
    } 

}
