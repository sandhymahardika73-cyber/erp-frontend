<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-slate-900 rounded flex items-center justify-center text-white font-bold text-lg">E</div>
                    <span class="text-xl font-bold tracking-wider text-slate-800">ERP</span>
                </div>

                <nav class="space-y-1">
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-700 rounded-lg transition-colors">
                        <i class="fa-solid fa-user-group w-5"></i>
                        <span class="font-medium text-sm">Users</span>
                    </a>
                    <a href="{{ route('customers.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('customers.*') ? 'bg-gray-100 text-slate-900 font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
                        <i class="fa-solid fa-users w-5"></i>
                        <span class="text-sm">Customers</span>
                    </a>
                    <a href="{{ route('services.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('services.*') ? 'bg-gray-100 text-slate-900 font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
                        <i class="fa-solid fa-box w-5"></i>
                        <span class="text-sm">Services</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                        <i class="fa-solid fa-file-invoice w-5"></i>
                        <span class="text-sm">Subscription</span>
                    </a>
                </nav>
            </div>
            
            <div class="p-6 border-t border-gray-100">
                <button class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-columns"></i>
                </button>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-gray-50 p-10">
            @yield('content')
        </main>
    </div>

    <script>
        // Fungsi Toggle Dropdown Action
        function toggleDropdown(id) {
            const dropdown = document.getElementById(`dropdown-${id}`);
            // Tutup semua dropdown lain yang sedang terbuka
            document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
                if(el.id !== `dropdown-${id}`) el.classList.add('hidden');
            });
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.closest('.action-btn')) {
                document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));
            }
        }

        // Fungsi Modal Open/Close
        function openModal() {
            document.getElementById('crud-modal').classList.remove('hidden');
            document.getElementById('crud-modal').classList.add('flex');
        }
        function closeModal() {
            document.getElementById('crud-modal').classList.add('hidden');
            document.getElementById('crud-modal').classList.remove('flex');
        }
    </script>
</body>
</html>