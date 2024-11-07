<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Galeria;
use App\Models\Servicio;
use App\Models\Oferta;
use App\Models\Opinion;
use App\Models\Contacto;
use App\Models\Pago;
use App\Models\Factura;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Insertar usuarios
        Usuario::insert([
            ['name' => 'Juan Pérez', 'email' => 'juan.perez@example.com', 'password' => bcrypt('contraseña123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'María López', 'email' => 'maria.lopez@example.com', 'password' => bcrypt('contraseña456'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Carlos Sánchez', 'email' => 'carlos.sanchez@example.com', 'password' => bcrypt('contraseña789'), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar clientes
        Cliente::insert([
            ['nombre' => 'Juan Pérez', 'correo' => 'juan.perez@example.com', 'telefono' => '555-1234'],
            ['nombre' => 'María López', 'correo' => 'maria.lopez@example.com', 'telefono' => '555-5678'],
            ['nombre' => 'Carlos Sánchez', 'correo' => 'carlos.sanchez@example.com', 'telefono' => '555-9101'],
        ]);

        // Insertar habitaciones
        Habitacion::insert([
            ['tipo' => 'Suite', 'descripcion' => 'Habitación de lujo con vistas al mar', 'imagen_url' => 'url_imagen_suite', 'precio' => 200.00, 'created_at' => now(), 'updated_at' => now()],
            ['tipo' => 'Doble', 'descripcion' => 'Habitación doble estándar', 'imagen_url' => 'url_imagen_doble', 'precio' => 100.00, 'created_at' => now(), 'updated_at' => now()],
            ['tipo' => 'Individual', 'descripcion' => 'Habitación individual cómoda y económica', 'imagen_url' => 'url_imagen_individual', 'precio' => 50.00, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar reservas
        Reserva::insert([
            ['cliente_id' => 1, 'fecha_entrada' => '2024-10-01', 'fecha_salida' => '2024-10-05', 'habitacion_id' => 1, 'num_huespedes' => 2, 'fecha_reserva' => now()],
            ['cliente_id' => 2, 'fecha_entrada' => '2024-10-10', 'fecha_salida' => '2024-10-15', 'habitacion_id' => 2, 'num_huespedes' => 3, 'fecha_reserva' => now()],
            ['cliente_id' => 3, 'fecha_entrada' => '2024-10-20', 'fecha_salida' => '2024-10-25', 'habitacion_id' => 3, 'num_huespedes' => 1, 'fecha_reserva' => now()],
        ]);

        // Insertar galería
        Galeria::insert([
            ['categoria' => 'Paisajes', 'imagen_url' => 'url_imagen_paisaje', 'descripcion' => 'Hermoso paisaje montañoso', 'fecha_subida' => now()],
            ['categoria' => 'Interiores', 'imagen_url' => 'url_imagen_interior', 'descripcion' => 'Diseño interior moderno', 'fecha_subida' => now()],
            ['categoria' => 'Eventos', 'imagen_url' => 'url_imagen_evento', 'descripcion' => 'Evento especial en el hotel', 'fecha_subida' => now()],
        ]);

        // Insertar servicios
        Servicio::insert([
            ['nombre' => 'Spa', 'descripcion' => 'Relájate en nuestro spa de lujo', 'imagen_url' => 'url_imagen_spa'],
            ['nombre' => 'Gimnasio', 'descripcion' => 'Completo gimnasio con equipamiento moderno', 'imagen_url' => 'url_imagen_gimnasio'],
            ['nombre' => 'Restaurante', 'descripcion' => 'Disfruta de nuestra gastronomía exclusiva', 'imagen_url' => 'url_imagen_restaurante'],
        ]);

        // Insertar ofertas
        Oferta::insert([
            ['nombre' => 'Descuento de Invierno', 'descripcion' => '10% de descuento en todas las habitaciones', 'fecha_inicio' => '2023-12-01', 'fecha_fin' => '2024-01-31', 'descuento' => 10.00],
            ['nombre' => 'Oferta de Fin de Semana', 'descripcion' => '15% de descuento en estancias de fin de semana', 'fecha_inicio' => '2024-02-01', 'fecha_fin' => '2024-03-31', 'descuento' => 15.00],
            ['nombre' => 'Paquete Familiar', 'descripcion' => '20% de descuento para familias', 'fecha_inicio' => '2024-04-01', 'fecha_fin' => '2024-05-31', 'descuento' => 20.00],
        ]);

        // Insertar opiniones
        Opinion::insert([
            ['cliente_id' => 1, 'comentario' => 'Excelente servicio y ubicación', 'calificacion' => 5, 'Aprobado' => true, 'fecha_opinion' => now()],
            ['cliente_id' => 2, 'comentario' => 'Buena relación calidad-precio', 'calificacion' => 4, 'Aprobado' => true, 'fecha_opinion' => now()],
            ['cliente_id' => 3, 'comentario' => 'Habitaciones limpias y cómodas', 'calificacion' => 5, 'Aprobado' => true, 'fecha_opinion' => now()],
        ]);

        // Insertar contactos
        Contacto::insert([
            ['nombre' => 'Ana Torres', 'correo' => 'ana.torres@example.com', 'asunto' => 'Consulta de Reservas', 'mensaje' => 'Quisiera información sobre disponibilidad en marzo', 'fecha_contacto' => now()],
            ['nombre' => 'Pedro Gómez', 'correo' => 'pedro.gomez@example.com', 'asunto' => 'Servicio de Spa', 'mensaje' => '¿Qué servicios de spa ofrecen?', 'fecha_contacto' => now()],
            ['nombre' => 'Laura Ruiz', 'correo' => 'laura.ruiz@example.com', 'asunto' => 'Eventos', 'mensaje' => 'Información sobre salones de eventos', 'fecha_contacto' => now()],
        ]);

        // Insertar pagos
        Pago::insert([
            ['reserva_id' => 1, 'monto' => 800.00, 'fecha_pago' => now(), 'metodo_pago' => 'Tarjeta de Crédito'],
            ['reserva_id' => 2, 'monto' => 600.00, 'fecha_pago' => now(), 'metodo_pago' => 'Transferencia Bancaria'],
            ['reserva_id' => 3, 'monto' => 250.00, 'fecha_pago' => now(), 'metodo_pago' => 'Efectivo'],
        ]);

        // Insertar facturas (ejemplo)
        Factura::insert([
            ['reserva_id' => 1, 'monto' => 800.00, 'fecha_emision' => now(), 'estado' => 'Pagada'],
            ['reserva_id' => 2, 'monto' => 600.00, 'fecha_emision' => now(), 'estado' => 'Pagada'],
            ['reserva_id' => 3, 'monto' => 250.00, 'fecha_emision' => now(), 'estado' => 'Pendiente'],
        ]);
    }
}
