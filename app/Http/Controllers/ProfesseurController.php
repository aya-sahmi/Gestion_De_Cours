<?php
namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesseurController extends Controller
{
    public function create()
    {
        return view('professeur.inscription');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:60',
            'prenom' => 'required|string|max:60',
            'email' => 'required|email|unique:professeurs,email',
            'password' => 'required|string|min:6|confirmed',
            'module_enseigne' => 'required|string|max:100',
        ]);

        $professeur = Professeur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'module_enseigne' => $request->module_enseigne,
        ]);

        return redirect()->route('professeur.login')->with('success', 'Professeur inscrit avec succès. Vous pouvez maintenant vous connecter.');
    }
    public function index()
    {
        $professeurs = Professeur::all();
        return view('professeur.index', compact('professeurs'));
    }
    public function mesCours(){
        $professeur_id = session('professeur_id');
        $cours = Cours::where('professeur_id', $professeur_id)->paginate(10);
        return view('professeur.cours', compact('cours'));
    }
    public function login(){
        return view('professeur.login');
    }

    public function verifLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if (Auth::guard('professeur')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $professeur = Auth::guard('professeur')->user();
            session([
                'authentification' => true,
                'professeur_id' => $professeur->id,
                'name' => $professeur->nom . ' ' . $professeur->prenom,
            ]);
            return redirect()->route('professeur.cours');
        } else {
            return redirect()->route('professeur.login')->with('error_login', 'Email ou mot de passe incorrect');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('professeur.login')->with('logout_message', 'Vous êtes déconnecté avec succès.');
    }
}
