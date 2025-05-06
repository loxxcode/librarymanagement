<x-app-layout>
    <x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Books') }}
            </h2>
        
        </div>
    </x-slot>
    <form action="{{ route("books.store") }}" class="myform" method="post">
        @csrf
        @method('POST')
        <div>
            <input type="text" name="isbn" placeholder="ISBN">
        </div>
        <div>
            <input type="text" name="book_name" placeholder="Book name">
        </div>
        <div>
            <input type="text" name="publisher_name" placeholder="Publisher Name">
        </div>
        <div>
            <input type="text" name="description" placeholder="Description">
        </div>
        <input type="submit" value="Add Book">
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