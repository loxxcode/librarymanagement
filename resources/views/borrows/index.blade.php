<x-app-layout>
<x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Borrow List') }}
            </h2>
        </div>
    </x-slot>
    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif
    <a href="/borrows/create" class="button">Add borrow</a>
    <table>
        <thead>
            <th>Book Name</th>
            <th>Member Name</th>
            <th>Quantity</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Description</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->books->book_name }}</td>
                    <td>{{ $borrow->members->name }}</td>
                    <td>{{ $borrow->quantity }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>{{ $borrow->description }}</td>
                    <td><a href="{{ route("borrows.edit",['id' => $borrow->id]) }}">Update</a></td>
                    <td>
                        <form action="{{ route("borrows.delete",['id' => $borrow->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
<style>
        .button{
            display: flex;
            background: white;
            width: 150px;
            border-radius: 15px;
            padding: 1rem;
            margin: 2rem 10rem;
            text-align: center;
            justify-content: center
        }
        .button:hover{
            background: rgba(123, 123, 123, 0.2);
        }
        table,tr,td,th{
            border: 1px solid black;
            padding: 1rem;
        }
        table{
            margin: 0 20rem;
        }
        .success{
            position: absolute;
            margin-top: 3rem;
            margin-left: 30rem;
            color: green;
            font-weight: bolder;
            cursor: pointer;
        }
        .edit:hover{
            color: gray;
        }
        .delete{
            cursor: pointer;
        }
        .delete:hover{
            color: red;
        }
        .fail{
            position: absolute;
            margin-top: 3rem;
            margin-left: 30rem;
            color: red;
            font-weight: bolder;
            cursor: pointer;
        }
    </style>