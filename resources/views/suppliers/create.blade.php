<x-app-layout>
<x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Supplier Create') }}
            </h2>
        </div>
    </x-slot>
    <form action="{{ route("suppliers.store") }}" class="myform" method="post">
        @csrf
        @method('POST')
        
        <div>
            <label for="">Book Name</label>
            <select name="book_id" id="">
                <option value="#">Select Book</option>
                @foreach ($book as $books)
                    <option value="{{ $books->isbn }}">{{ $books->book_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Supplier Name</label>
            <input type="text" name="supplier_name" placeholder="supplier name">
        </div>
        <div>
            <label for="">Quantity</label>
            <input type="text" name="quantity" >
        </div>
        <div>
            <label for="">Supplier Contact</label>
            <input type="number" name="contact_number" placeholder="supplier Contact">
        </div>
        <input type="submit" value="Add Supplier">
    </form>
</x-app-layout>
<style>
        .myform{
            margin: 1rem 33rem;
            background: white;
            padding: 1rem 2rem;
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            line-height: 2rem;
        }
        select{
            width: 100%;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
        }
        input[type="text"],
        input[type="number"]{
            width: 100%;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
        }
        input[type="submit"]{
            background: #4CAF50;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            margin: 0 4rem;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background: #45a049;
        }
    </style>