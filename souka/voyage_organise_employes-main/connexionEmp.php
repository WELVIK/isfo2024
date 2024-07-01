<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
        <title>Page de connexion</title>6
    </head>
    <body class="bg-gray-200 flex justify-center items-center min-h-screen">
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 px-6 py-10 sm:px-10 sm:py-6 bg-gradient-to-b from-[#063970] to-blue-200 rounded-lg shadow-md lg:shadow-lg">
            <div class="text-center mb-4">
                <h6 class="font-semibold text-white text-xl">Login</h6>
            </div>
            <form class="space-y-5" method="POST" action="connexionAction.php">
                <div>
                    <input id="email" type="text" name="user"  class="block w-full py-3 px-3 mt-2 text-gray-800 appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                </div>

                <div class="relative w-full">
                    <input :type="showPass ? 'password' : 'text'" id="password" name="pwd"  class="block w-full py-3 px-3 mt-2 mb-4 text-gray-800 appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <p class="font-semibold cursor-pointer" @click="showPass = !showPass" x-text="showPass ? 'Show' : 'Hide'">Show</p>
                    </div>
                </div>

                <button type="submit" class="w-full py-3 mt-10 bg-[#063970] rounded-md font-medium text-white uppercase focus:outline-none hover:shadow-none">
                    Se connecter
                </button>
            </form>
        </div>
    </body>
</html>
