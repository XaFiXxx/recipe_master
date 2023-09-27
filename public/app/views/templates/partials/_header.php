<div x-data="{ open: false }" class="bg-gray-800">
<div class="container mx-auto px-4">
          <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
              <a
                class="text-white font-bold text-xl flex items-center"
                href="?">
                <i class="fas fa-utensils text-yellow-500 mr-2"></i> RECIPE
                MASTER
              </a>
            </div>
            <div class="flex md:hidden">
              <button
                @click="open = !open"
                type="button"
                class="text-white hover:text-yellow-500 focus:outline-none focus:text-yellow-500">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                  <path
                    x-show="!open"
                    class="inline-flex"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16Z"/>
                  <path
                    x-show="open"
                    class="inline-flex"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16ZM6 21H18V19H6V21ZM6 3H18V1H6V3Z"/>
                </svg>
              </button>
            </div>
      <?php include '../app/views/templates/partials/_nav.php';  ?>
    </div>