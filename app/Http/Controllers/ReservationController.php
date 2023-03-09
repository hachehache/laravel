<?php 
     // CONTROLLER CLIENT //
     // RESERVATION UNIQUEMENT //
namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
   

    //cette methode affiche un formulaire de création de réservation
    //public function create()//
    public function index()
    {
         //dd($request->all());
        //dump("toto");die;

//-------- INFO DU RESTAURANT----------------------------------------------//

// equivaut à :
      // select * from categorie order by asc
      $adresse = DB::table('restaurant')
      // equivaut a 
      //select * from restaurant where cle='adresse'  
      // mettre '=' car si on ne met pas cela veut dire que l'on affecte une valeur
      // à la clé, alors que l'on veut lire la valeur
      ->where('cle', '=', 'adresse')
      // avec first plutot que ->get() car on ne recupère que le 1er 
      //element plutot qu'une liste
      //->get()
      ->first()
      ;
      // equivaut a :
      //select * from restaurant where cle='tel'
      $tel = DB::table('restaurant')
      ->where('cle', '=', 'tel')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;

      $map = DB::table('restaurant')
      // equivaut a :
      //select * from restaurant where cle='map'
      ->where('cle', '=', 'map')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;

      $horaire = DB::table('restaurant')
      // equivaut a :
      //select * from restaurant where cle='horaire'
      ->where('cle', '=', 'horaire')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;

//------------------------------------------------------//

        //valeur par default afficher avant modif par le restaurateur
        // ne pas appeler de save
        $reservation = new Reservation();
        
        $reservation->nom =  '';
        $reservation->prenom =  '';
        $reservation->jour = '';
        $reservation->heure = '20:00';
        $reservation->nombre_personnes = 2;
        $reservation->tel = '';
        $reservation->email = '';
    
        //Recuperation des créneaux horaires de réservation
        $creneaux_horaires = $this->getCreneauxHoraires();
       //dump($creneaux_horaires);
        // transmission des valeurs par défaut à la vue
        return view('reservation', [
            'reservation' => $reservation,
           'creneaux_horaires' =>  $creneaux_horaires,
           'adresse' => $adresse->valeur,
           'tel' => $tel->valeur,
           'map' => $map->valeur,
           'horaire' => $horaire->valeur,
        ]);
    }
    
    //cette methode enregistre les données d'une nouvelle reservation dans la base de données 
    public function store(Request $request)
    {
        //dd($request->all());

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
    return redirect()->route('reservation');
    }


    // affiche un formulaire de modification
    // $id est le paramètre de la réservation
    public function edit(int $id)
    {   
        // recup de la reservation
        $reservation = Reservation::find($id);
    // affichage d'une erreur 404 si la reservation est introuvable
    // !$reservation veut dire :si pas reservation alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$reservation) {
            abort(404);
        }

        //suppresssion des secondes
        // ici on recupère hh:mm::ss, on lit de 0 jusque la fin et on retire les 3 derniers caractères
        // ":ss"
        $reservation->heure = substr($reservation->heure, 0, strlen($reservation->heure) -3);

        //Recupertion des créneaux horaires de réservation
       $creneaux_horaires = $this->getCreneauxHoraires();

        // le bloc de code ci-dessus créé un tableau équivalent à celui-dessous
         $creneaux_horaires = [
               // 12:xx
            "12:00",
           "12:15",
            "12:30",
            "12:45",
            // 23:xx
            "23:00",
         ];

        // transmission de la reservation à la vue
        return view('admin.reservation.edit', [
            'reservation'=> $reservation,
            'creneaux_horaires' => $creneaux_horaires,
        ]);
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


