<nav class="shadow-md">
            <div class="hidden md:flex items-center space-x-4">
              <form action="recettes/search">
              <input
                type="text"
                name="search"
                placeholder="Rechercher une recette..."
                class="p-2 rounded-md"/>
              </form>
              
                <a class="text-white hover:text-yellow-500 px-3 py-2" href="?"
                >Acceuil</a>
              <a
                class="text-white hover:text-yellow-500 px-3 py-2"
                href="recettes"
                >Recettes</a>
              <a
                class="text-white hover:text-yellow-500 px-3 py-2"
                href="chefs"
                >Chefs</a>
                <a
                class="text-white hover:text-yellow-500 px-3 py-2"
                href="login/form"
                >Connexion</a>
            </div>
          </div>
        </div>
        <div x-show="open" class="md:hidden bg-gray-700">
          <input
            type="text"
            placeholder="Rechercher une recette..."
            class="p-2 w-full"/>
            <a class="block text-white hover:text-yellow-500 px-3 py-2" href="?"
            >Acceuil</a>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="recettes"
            >Recettes</a>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="chefs"
            >Chefs</a>
            <a class="block text-white hover:text-yellow-500 px-3 py-2" href="login/form"
            >Connexion</a>
        </div>
      </nav>