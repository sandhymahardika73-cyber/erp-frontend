@extends('layouts.app')

@content('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-slate-800">Services</h1>
        <button onclick="openModal()" class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2 transition-colors">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Add Data</span>
        </button>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4">Service Name</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($services as $service)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $service['name'] }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($service['price'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $service['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($service['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right relative">
                            <button onclick="toggleDropdown({{ $service['id'] }})" class="action-btn text-gray-600 hover:text-gray-900 p-1.5 inline-flex items-center rounded-md hover:bg-gray-100">
                                <i class="fa-solid fa-bars"></i>
                            </button>

                            <div id="dropdown-{{ $service['id'] }}" class="hidden absolute right-6 mt-1 w-36 bg-white border border-gray-200 rounded-lg shadow-lg z-10 py-1 text-left">
                                <a href="#" class="flex items-center space-x-2 px-4 py-2 text-xs text-gray-700 hover:bg-gray-50">
                                    <i class="fa-solid fa-key text-gray-400 w-4"></i> <span>Active</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 px-4 py-2 text-xs text-gray-700 hover:bg-gray-50">
                                    <i class="fa-solid fa-link-slash text-gray-400 w-4"></i> <span>Deactivate</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 px-4 py-2 text-xs text-gray-700 hover:bg-gray-50">
                                    <i class="fa-solid fa-pen text-gray-400 w-4"></i> <span>Edit</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 px-4 py-2 text-xs text-red-600 hover:bg-red-50 border-t border-gray-100 mt-1">
                                    <i class="fa-solid fa-trash w-4"></i> <span>Delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-400">No services data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div id="crud-modal" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-xs items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-xl w-full shadow-2xl overflow-hidden transform transition-all animate-in fade-in zoom-in-95 duration-200">
        <div class="px-8 pt-8 pb-4 text-center">
            <h3 class="text-2xl font-bold text-slate-800">Add Services</h3>
        </div>
        
        <form action="#" method="POST" class="px-8 pb-8 space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Service Name</label>
                <input type="text" name="name" placeholder="Enter your name" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 transition-colors">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Price</label>
                <input type="text" name="price" placeholder="Enter your price" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 transition-colors">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Description</label>
                <textarea name="description" rows="3" placeholder="Enter your description" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 transition-colors resize-none"></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status</label>
                <select name="status" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 text-gray-500 appearance-none transition-colors">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal()" class="px-5 py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">Cancel</button>
                <button type="submit" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-800 text-white rounded-xl text-sm font-medium shadow-sm transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection