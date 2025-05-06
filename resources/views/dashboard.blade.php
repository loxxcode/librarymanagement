<x-app-layout>
<x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        
        </div>
    </x-slot>
<div class="container">
    <div class="product">
        <h2>Books</h2>
        <p>{{ $book }}</p>
    </div>
    
    <div class="product">
        <h2>Supplier</h2>
        <p>{{ $supplier }}</p>
    </div>
    
    <div class="product">
        <h2>Member</h2>
        <p>{{ $member }}</p>
    </div>
    <div class="product">
        <h2>Borrow</h2>
        <p>{{ $borrow }}</p>
    </div>
</div>
<style>
    .container{
        display: flex;
        gap: 5rem;
        justify-content: center;
        text-align: center;
        margin: 10rem 2rem;
    }
    .product{
        /* background-color: #f0f0f0; */
        background: #ffffff;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        width: 200px;
        height: 120px;
    }
    h2{
        font-size: larger;
    }
    p{
        font-size: 24px;
    }
</style>
</x-app-layout>
