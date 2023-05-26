<?php

class AppController
{

    public static function index()
    {
        $produits = Produit::findAll();
        include(VIEWS . 'app/index.php');
    }

    public static function ajoutProduit()
    {
        // On vérifie que l'utilisateur a cliqué sur le bouton :
        if(!empty($_POST))
        {
            // On crée un tableau vide pour gérer nos erreurs : 
            $error = [];
            // Série de vérification que les champs du form sont bien remplies :
            if(empty($_POST['nom']))
            {
                $error['nom'] = 'Veuillez remplir le champ nom.';
            }
            if(empty($_POST['description']))
            {
                $error['description'] = 'Veuillez remplir le champ description.';
            }
            if(empty($_POST['prix']))
            {
                $error = 'Veuillez remplir le champ prix.';
            }

            if(empty($_FILES['image']['name']))
            {
                $error['image'] = 'Veuillez remplir le champ image.';
            }
        // S'il n'y a pas d'erreur on peut traiter l'image et envoyer les données en BDD :
        if(!$error)
        {
            // Vérification de la taille et du type de fichier :
            if($_FILES['image']['size'] < 3000000 && ($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/gif' || $_FILES['image']['type'] == 'image/webp'))
            {
                // On crée un nouveau nom unique  pour l'image afin d'éviter les conflits :
                $nomImage = date('dmYHis') . $_FILES['image']['name'];
                // On copie le fichier stocker de manière temporaire dans le dossier upload avec son nouveau nom :
                copy($_FILES['image']['tmp_name'], PUBLIC_FOLDER . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $nomImage);
                // Création d'un tableau de donnée qui sera envoyé en BDD :
                $data = [
                    'nom' => $_POST['nom'],
                    'categorie' => $_POST['categorie'],
                    'image' => $nomImage,
                    'prix' => $_POST['prix'],
                    'description' => $_POST['description']
                ];
                // Appel de la méthode static ajouter () de la classe Produit qui se charge d'envoyer notre tableau de donnée en BDD : 
                Produit::ajouter($data);
                $_SESSION['messages']['success'][] = 'Le produit a bien été ajouté.';
                header('Location:' . BASE);
                exit();
            }
        }
    }   
        include(VIEWS . 'app/ajoutProduit.php');
    }
    public static function gestionProduit()
    {
        $produits = Produit::findAll();
        include(VIEWS . 'app/gestionProduit.php');
    }

    public static function modifierProduit()
    {   
        //*ici on vérifier que notre GET['id'] n'est pas vide afin de récupérer notre produit
        if(!empty($_GET['id'])){
            //*je récupère mon produit grâce a son id
            $produit = Produit::findById(['id_produit' => $_GET['id']]);
            $prduit = Produit::findById(['id_produit' => $_GET['id']]);
        }else 
        {
            header('Location:' . BASE . 'produit/gestion');
        }
        //*si l'utilisateur a cliqué sur modifier alors je rentre dans les accolades
        if(!empty($_POST))
        {
            //*création d'un tableau d'erreur vide
            $error = [];
            foreach($_POST as $indice => $valeur)
            {
                if(empty($valeur))
                {
                    $error[$indice] = "le champs $indice est obligatoire";
                }
            }
            // S'il n'y a pas d'erreur on fait notre traitement.
                if(!$error)
                {
                    // On vérifie qu'il y a une nouvelle image dans l'input de type file avec ke bon poids et le bon type :
                    if((!empty($_FILES['image']['name'])) && $_FILES['image']['size'] < 3000000 && ($_FILES['image']['type'] == 'image/jpeg'|| $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/gif' || $_FILES['image']['type'] == 'image/webp' ))
                    {
                        $nomImage = date("dmYHis") . $_FILES['image']['name'];

                        unlink(PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $_POST['ancienneImg']);

                        copy($_FILES['image']['tmp_name'], PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $nomImage);
                    }else
                    {
                        $nomImage = $_POST['ancienneImg'];
                    }

                    Produit::update([
                        'nom' => $_POST['nom'],
                        'categorie' => $_POST['categorie'],
                        'image' => $nomImage,
                        'prix' => $_POST['prix'],
                        'description' => $_POST['description'],
                        'id_produit' => $_GET['id']
                    ]);
                    $_SESSION['messages']['success'][] = 'Le produit a bien été modifié.';

                    header('location:' . BASE . 'produit/gestion');
                    exit();
                }
            

        }
        include(VIEWS . 'app/modifierProduit.php');
    }
    
    public static function supprimerProduit()
    {
        if(!empty($_GET['id']))
        {
            Produit::delete(['id_produit' => $_GET['id']]);
            $_SESSION['messages']['success'][] = 'Le produit a bien été supprimé.';
        }

        header('Location:' . BASE . 'produit/gestion');
        exit();
    }

    public static function focus()
    {
        if(!empty($_GET['id']))
        {
            $produit = Produit::findById(['id_produit' => $_GET['id']]);
            include(VIEWS . 'app/focus.php');
        }
    }

    public static function inscrire()
    {
        if(!empty($_POST))
        {
            $error = [];

            if(empty($_POST['email']))
            {
                $error['email'] = 'Veuillez remplir le champ email svp.';
            }
            if(empty($_POST['nom']))
            {
                $error['nom'] = 'Veuillez remplir le champ nom svp.';
            }
            if(empty($_POST['prenom']))
            {
                $error['prenom'] = 'Veuillez remplir le champ prénom svp.';
            }
            if(empty($_POST['pseudo']))
            {
                $error['pseudo'] = 'Veuillez choisir un pseudo svp.';
            }
            if(empty($_POST['password']))
            {
                $error['password'] = 'Veuillez remplir le champ mot de passe svp.';
            }

            if(!$error)
            {
                // Chiffrement du mot de passe : 
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $data = [
                    'email' => $_POST['email'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'pseudo' => $_POST['pseudo'],
                    'password' => $password,
                ];
                User::inscription($data);
                header('Location:' . BASE);
                exit();
                
            }
        }
        include(VIEWS . 'app/inscription.php');
    }

    public static function connexion()
    {
        if(!empty($_POST))
        {
            $error = [];
            if(empty($_POST['pseudo']))
            {
                $error['pseudo'] = 'Champ non rempli.';

            }
            if(empty($_POST['password']))
            {
                $error['password'] = 'Champ non rempli.';
            }

            if(!$error)
            {   $data = 
                [
                    'pseudo' => $_POST['pseudo'],

                ];
                $password = $_POST['password'];
                User::seConnecter($data, $password);
                $_SESSION['messages']['success'][] = 'Vous êtes connecté !';
                header('Loation:' . BASE);
            }else
            {
                $_SESSION['messages']['danger'] = 'Pseudo ou mot de passe incorrect !';
            }
        }
        include(VIEWS . 'app/connexion.php');
    }
}
