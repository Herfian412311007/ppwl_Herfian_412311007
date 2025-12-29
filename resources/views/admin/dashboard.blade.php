<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <div class="container">
        <h1 class="fw-bold text-danger">Admin Dashboard</h1>
        <p>Halo Admin, ini adalah halaman khusus untuk mengelola TokoKu.</p>

        <div class="mt-4">
            <ul>
                <li><a href="{{ route('products.index') }}">Kelola Produk</a></li>
                <li><a href="{{ route('orders.index') }}">Kelola Pesanan</a></li>
                <li><a href="{{ route('users.index') }}">Kelola User</a></li>
            </ul>
        </div>
    </div>
</x-app-layout>