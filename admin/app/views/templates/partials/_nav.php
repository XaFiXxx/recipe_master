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
        <a class="navbar-brand" href="#">BackOffice - BOOK HUNTER</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse flex">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Tableau de Bord</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">BOOKS <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">GESTION DES BOOKS</li>
              <li><a href="books">Liste des books</a></li>
              <li><a href="books/add/form">Ajouter un book</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">GESTION DES CATÉGORIES</li>
              <li><a href="categories">Liste des catégories</a></li>
              <li><a href="categories/add/form">Ajouter une catégorie</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">GESTION DES TAGS</li>
              <li><a href="tags">Liste des tags</a></li>
              <li><a href="tags/add/form">Ajouter un tag</a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Utilisateurs <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">GESTION DES AUTHEURS</li>
              <li><a href="authors">Liste des autheurs</a></li>
              <li><a href="authors/add/form">Ajouter un autheur</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">GESTION DES UTILISATEURS</li>
              <li><a href="users">Liste des utilisateurs</a></li>
              <li><a href="users/add/form">Ajouter un utilisateur</a></li>
            </ul>
          </li>
          <li class=""><a href="#t">Paramètres</a></li>
          <li class=""><a href="pseudo/logout">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>