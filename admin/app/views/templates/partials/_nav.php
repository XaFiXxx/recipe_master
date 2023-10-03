<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">BackOffice - RECIPE_MASTER</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse flex">
        <ul class="nav navbar-nav">
          <li class=""><a href="#">Tableau de Bord</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Recettes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">GESTION DES RECETTES</li>
              <li><a href="recettes">Liste des recettes</a></li>
              <li><a href="recettes/add/form">Ajouter une recette</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">GESTION DES CATÉGORIES</li>
              <li><a href="categories">Liste des catégories</a></li>
              <li><a href="categories/add/form">Ajouter une catégorie</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">GESTION DES INGREDIENTS</li>
              <li><a href="ingredients">Liste des ingrédients</a></li>
              <li><a href="ingredients/add/form">Ajouter un ingrédient</a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Utilisateurs <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">GESTION DES UTILISATEURS</li>
              <li><a href="users">Liste des utilisateurs</a></li>
              <li><a href="users/add/form">Ajouter un utilisateur</a></li>
            </ul>
          </li>
          <li class=""><a href="#t">Paramètres</a></li>
          <li class=""><a href="name/logout">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>