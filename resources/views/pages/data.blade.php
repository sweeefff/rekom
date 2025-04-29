<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        /* Animation for table rows */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white shadow-lg">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
                <div class="flex items-center ps-2.5 mb-8 mt-2">
                    <i class="fas fa-utensils text-white text-2xl mr-3"></i>
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Resto Dashboard</span>
                </div>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg bg-gray-700 group">
                            <i class="fas fa-table w-5 h-5 text-gray-300 transition duration-75 group-hover:text-white"></i>
                            <span class="ms-3">Menu Items</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700 group">
                            <i class="fas fa-store w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                            <span class="ms-3">Restaurants</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700 group">
                            <i class="fas fa-tags w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                            <span class="ms-3">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700 group">
                            <i class="fas fa-chart-line w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                            <span class="ms-3">Analytics</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="sm:ml-64">
            <!-- Navbar -->
            <nav class="bg-white border-b border-gray-200 fixed w-full z-20 top-0 start-0">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <span class="self-center text-xl font-semibold whitespace-nowrap">Menu Management</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="button" class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        <div class="relative">
                            <button type="button" class="flex items-center space-x-2">
                                <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="User photo">
                                <span class="text-sm font-medium">Admin</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <div class="p-6 mt-16">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <!-- Header with search and add button -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-2xl font-bold text-gray-800">Menu Items</h2>
                            <p class="text-gray-600">Manage all restaurant menu items</p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-search text-gray-500"></i>
                                </div>
                                <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search menus...">
                            </div>
                            <button type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                <i class="fas fa-plus mr-2"></i> Add New Menu
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg custom-scrollbar">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            ID
                                            <button onclick="sortTable(0)">
                                                <i class="fas fa-sort ml-1"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Name
                                            <button onclick="sortTable(1)">
                                                <i class="fas fa-sort ml-1"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Category
                                            <button onclick="sortTable(2)">
                                                <i class="fas fa-sort ml-1"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Description
                                            <button onclick="sortTable(3)">
                                                <i class="fas fa-sort ml-1"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Price
                                            <button onclick="sortTable(4)">
                                                <i class="fas fa-sort ml-1"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Restaurant ID
                                            <button onclick="sortTable(5)">
                                                <i class="fas fa-sort ml-1"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="menuTableBody">
                                <!-- Sample data rows will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">1-10</span> of <span class="font-semibold text-gray-900">100</span></span>
                        <ul class="inline-flex -space-x-px text-sm h-8">
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    
    <script>
        // Sample data for the table
        const menuData = [
            {
                id_menu: 101,
                nama: "Spaghetti Carbonara",
                kategori: "Pasta",
                deskripsi_menu: "Classic Italian pasta with creamy sauce, pancetta, and parmesan",
                harga: 125000,
                id_resto: 5,
                gambar_menu: "https://images.unsplash.com/photo-1611270630966-2267bdd0d6a1?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 102,
                nama: "Beef Burger",
                kategori: "Fast Food",
                deskripsi_menu: "Juicy beef patty with cheese, lettuce, tomato and special sauce",
                harga: 85000,
                id_resto: 2,
                gambar_menu: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 103,
                nama: "Caesar Salad",
                kategori: "Salad",
                deskripsi_menu: "Fresh romaine lettuce with Caesar dressing, croutons and parmesan",
                harga: 75000,
                id_resto: 5,
                gambar_menu: "https://images.unsplash.com/photo-1546793665-c74683f339c1?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 104,
                nama: "Margherita Pizza",
                kategori: "Pizza",
                deskripsi_menu: "Traditional pizza with tomato sauce, mozzarella and basil",
                harga: 110000,
                id_resto: 3,
                gambar_menu: "https://images.unsplash.com/photo-1513104890138-7c749659a591?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 105,
                nama: "Chocolate Lava Cake",
                kategori: "Dessert",
                deskripsi_menu: "Warm chocolate cake with a molten center, served with vanilla ice cream",
                harga: 65000,
                id_resto: 5,
                gambar_menu: "https://images.unsplash.com/photo-1564355808539-22fda35bed7e?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 106,
                nama: "Grilled Salmon",
                kategori: "Seafood",
                deskripsi_menu: "Fresh salmon fillet grilled to perfection with lemon butter sauce",
                harga: 145000,
                id_resto: 1,
                gambar_menu: "https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 107,
                nama: "Chicken Teriyaki",
                kategori: "Japanese",
                deskripsi_menu: "Grilled chicken glazed with teriyaki sauce, served with rice and vegetables",
                harga: 95000,
                id_resto: 4,
                gambar_menu: "https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 108,
                nama: "Mushroom Risotto",
                kategori: "Italian",
                deskripsi_menu: "Creamy arborio rice cooked with mushrooms, white wine and parmesan",
                harga: 98000,
                id_resto: 5,
                gambar_menu: "https://images.unsplash.com/photo-1574894709920-11b28e7367e3?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 109,
                nama: "Beef Tacos",
                kategori: "Mexican",
                deskripsi_menu: "Three soft corn tortillas with seasoned beef, lettuce, cheese and salsa",
                harga: 88000,
                id_resto: 2,
                gambar_menu: "https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=500&auto=format&fit=crop&q=60"
            },
            {
                id_menu: 110,
                nama: "Green Curry",
                kategori: "Thai",
                deskripsi_menu: "Spicy Thai curry with coconut milk, bamboo shoots, bell peppers and basil",
                harga: 92000,
                id_resto: 4,
                gambar_menu: "https://images.unsplash.com/photo-1631515243349-e0cb75fb8d3a?w=500&auto=format&fit=crop&q=60"
            }
        ];

        // Function to populate the table with data
        function populateTable(data) {
            const tableBody = document.getElementById('menuTableBody');
            tableBody.innerHTML = '';
            
            data.forEach((menu, index) => {
                const row = document.createElement('tr');
                row.className = `bg-white border-b hover:bg-gray-50 animate-fade-in`;
                row.style.animationDelay = `${index * 0.05}s`;
                
                row.innerHTML = `
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${menu.id_menu}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${menu.nama}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">${menu.kategori}</span>
                    </td>
                    <td class="px-6 py-4 max-w-xs truncate">${menu.deskripsi_menu}</td>
                    <td class="px-6 py-4">Rp ${menu.harga.toLocaleString('id-ID')}</td>
                    <td class="px-6 py-4">${menu.id_resto}</td>
                    <td class="px-6 py-4">
                        <img class="w-16 h-16 object-cover rounded" src="${menu.gambar_menu}" alt="${menu.nama}">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                `;
                
                tableBody.appendChild(row);
            });
        }

        // Function to sort table
        function sortTable(columnIndex) {
            let sortedData = [...menuData];
            
            switch(columnIndex) {
                case 0: // ID
                    sortedData.sort((a, b) => a.id_menu - b.id_menu);
                    break;
                case 1: // Name
                    sortedData.sort((a, b) => a.nama.localeCompare(b.nama));
                    break;
                case 2: // Category
                    sortedData.sort((a, b) => a.kategori.localeCompare(b.kategori));
                    break;
                case 3: // Description
                    sortedData.sort((a, b) => a.deskripsi_menu.localeCompare(b.deskripsi_menu));
                    break;
                case 4: // Price
                    sortedData.sort((a, b) => a.harga - b.harga);
                    break;
                case 5: // Restaurant ID
                    sortedData.sort((a, b) => a.id_resto - b.id_resto);
                    break;
            }
            
            populateTable(sortedData);
        }

        // Function to search/filter table
        document.getElementById('search').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const filteredData = menuData.filter(menu => 
                menu.nama.toLowerCase().includes(searchTerm) || 
                menu.kategori.toLowerCase().includes(searchTerm) ||
                menu.deskripsi_menu.toLowerCase().includes(searchTerm) ||
                menu.id_menu.toString().includes(searchTerm) ||
                menu.id_resto.toString().includes(searchTerm)
            );
            populateTable(filteredData);
        });

        // Initialize the table with data
        document.addEventListener('DOMContentLoaded', function() {
            populateTable(menuData);
        });
    </script>
</body>
</html>