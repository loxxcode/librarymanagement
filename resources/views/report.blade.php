<?php
    $a = 1;
?>
<x-app-layout>
<x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Library Report') }}
            </h2>
            <button onclick="window.print()" class="print">Print</button>
        </div>
    </x-slot>
<div class="container mt-4">
    <div class="date">
        <form action="{{ route('datereport') }}" method="get">
            @csrf
            @method('GET')
            <div>
                <label for="">Start Date</label>
                <input type="date" name="startDate" placeholder="Start Date">
            </div>
            <div>
                <label for="">End Date</label>
                <input type="date" name="endDate" placeholder="End Date">
            </div>
            <input type="submit" value="Generate Report">
        </form>
    </div>
    <div>
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Book Name</th>
                <th>Publisher Name</th>
                <th>Borrowed By</th>
                <th>Borrow Quantity</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrow as $books)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $books->books->isbn }}</td>
                    <td>{{ $books->books->book_name }}</td>
                    <td>{{ $books->books->publisher_name }}</td>
                    <td>{{ $books->members->name }}</td>
                    <td>{{ $books->quantity }}</td>
                    <td>{{ $books->borrow_date }}</td>
                    <td>{{ $books->return_date }}</td>
                    <td>{{ $books->description }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
<style>
        form{
            display: flex;
            justify-content: center;
        }
        .date{
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        .date div{
            margin: 0 1rem;
        }
        .date input[type="date"]{
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .date input[type="submit"]{
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .date input[type="submit"]:hover{
            background-color: #0056b3;
        }
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
            margin: 2rem 15rem;
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
        .success{
            position: absolute;
            margin-top: 3rem;
            margin-left: 30rem;
            color: red;
            font-weight: bolder;
            cursor: pointer;
        }
        .print {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            transition: background 0.2s, transform 0.2s;
            margin-left: 70rem;
            margin-top: -10rem;
        }
        .print:hover, .print:focus {
            background: #1d4ed8;
            transform: translateY(-2px) scale(1.03);
            outline: none;
        }
        @media print {
            .print {
                display: none;
            }
        }
    </style>