<?PHP

include "./PHP/Outils.php";
spl_autoload_register("ChargerClasse");

//on active la connexion à la base de données
Parametre::init();
DbConnect::init();

session_start(); // initialise la variable de Session

$routes=[
    "default"=>["PHP/VIEW/","ListeRecettes","Acceuil"],
    "test"=>["PHP/VIEW/","test","aaa"],
    "Connexion"=>["PHP/VIEW/","formConnexion","Connexion"],
    "actionConnexion"=>["PHP/CONTROLLER/Action/","actionConnexion","formulaireDeConnexion"],
    "inscription"=>["PHP/VIEW/","formInscription","inscription"],
    "actionInscription"=>["PHP/CONTROLLER/Action/","actionInscription","formulaireDeConnexion"],
    "Deconnexion"=>["PHP/CONTROLLER/Action/","actionDeconnexion","formulaireDeConnexion"],
    "recette"=>["PHP/VIEW/","formRecette","recette"],
    "actionRecette"=>["PHP/CONTROLLER/Action/","actionRecette","recette"],
    "ingredients"=>["PHP/VIEW/","formIngredient","Ajouter un ingredient"],
    "actionIngredient"=>["PHP/CONTROLLER/Action/","actionIngredients"]
];

if (isset($_GET["codePage"]))
{

    $codePage = $_GET["codePage"];

    //Si cette route existe dans le tableau des routes
    if (isset($routes[$codePage]))
    {
        //Afficher la page correspondante
        AfficherPage($routes[$codePage]);
    }
    else
    {
        //Sinon afficher la page par defaut
        AfficherPage($routes["default"]);
    }

}
else
{
    //Sinon afficher la page par defaut
    AfficherPage($routes["default"]);

}