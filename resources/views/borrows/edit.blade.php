<x-app-layout>
<x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Borrow Update') }}
            </h2>
        </div>
    </x-slot>
    <form action="{{ route("borrows.update", ['id'=>$borrow]) }}" class="myform" method="post">
        @csrf
        @method('put')
        <div>
            <label for="">Book Name</label>
            <select name="book_id" id="">
                <option value="{{ $borrow->book_id }}">{{ $borrow->books->book_name }}</option>
                @foreach ($book as $books)
                    <option value="{{ $books->isbn }}">{{ $books->book_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Member Name</label>
            <select name="member_id" id="">
                <option value="{{ $borrow->member_id }}">{{ $borrow->members->name }}</option>
                @foreach ($member as $members)
                    <option value="{{ $members->id }}">{{ $members->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Quantity</label>
            <input type="text" name="quantity" value="{{ $borrow->quantity }}">
        </div>
        <div>
            <label for="">Borrow Date</label>
            <input type="date" name="borrow_date" value="{{ $borrow->borrow_date }}" placeholder="supplier name">
        </div>
        <div>
            <label for="">Return Date</label>
            <input type="date" name="return_date" value="{{ $borrow->return_date }}" placeholder="supplier Contact">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" value="{{ $borrow->description }}">
        </div>
        <input type="submit" value="Update Borrow">
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
        input[type="number"],
        input[type="date"]{
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
            margin: 0 2rem;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background: #45a049;
        }
    </style>