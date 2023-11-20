<x-app-layout> <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Dashboard')
    }} </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>{{ Auth::user()->name }}</div>
                    <div id="contador"></div>
                    <div id="miDiv">aaaaaaa</div>




                    <div class="container">
                        <h1>mejores puntuaciones</h1>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Puntuacion</th>
                                </tr>
                            </thead>

                            <form method="POST" action="/guardar">
                                @csrf
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" value="name" required>

                                <label for="puntuacion">Puntuación:</label>
                                <input type="number" name="puntuacion" value="puntuacion" required>

                                <button type="submit">guardar</button>
                            </form>

                            <tbody>
                                @foreach($rankings as $ranking)
                                <tr>
                                    <td>
                                        <form method="POST" action="/update">
                                            @csrf
                                            <label for="name">Nombre:</label>
                                            <input type="text" name="name" value="{{ $ranking->name }}" required>

                                            <label for="puntuacion">Puntuación:</label>
                                            <input type="number" name="puntuacion" value="{{ $ranking->puntuacion }}" required>
                                            <input type="number" name="id" value="{{ $ranking->id }}" hidden >
                                            <button type="submit">modificar</button>
                                        </form>
                                    </td>
                                    
                                    <td>
                                        <form method="POST" action="{{ route('delete', $ranking) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Eliminar</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>