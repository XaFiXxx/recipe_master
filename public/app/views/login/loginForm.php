<div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-semibold mb-6 text-center"><?php echo $title  ?></h2>
            <form action="login/submit" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-gray-800 font-semibold">Nom d'utilisateur</label>
                    <input type="text" id="username" name="name" class="border rounded-lg px-3 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-800 font-semibold">Mot de passe</label>
                    <input type="password" id="password" name="password" class="border rounded-lg px-3 py-2 w-full" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full px-4 py-2 font-semibold">Se connecter</button>
                </div>
            </form>
        </div>