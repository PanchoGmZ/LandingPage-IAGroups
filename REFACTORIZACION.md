# 🔧 Refactorización de Calculadoras - IA Groups

## 📋 Resumen Ejecutivo

Se refactorizó el código de todas las vistas de calculadoras siguiendo el principio de **Separación de Responsabilidades (SoC)** y arquitectura de **componentes modulares**, mejorando significativamente la mantenibilidad y escalabilidad del código.

---

## 🎯 Objetivo

Transformar archivos Blade monolíticos de **250-280 líneas** en archivos orquestadores de **80-115 líneas** que incluyen componentes reutilizables y bien documentados.

---

## 📁 Nueva Estructura de Archivos

```
resources/views/livewire/
├── components/                     # 🔄 COMPONENTES COMPARTIDOS (NUEVO)
│   ├── efectos-fondo.blade.php         # Efectos visuales animados
│   ├── header-calculadora.blade.php    # Header sticky con logo
│   ├── alertas-sesion.blade.php        # Mensajes flash (éxito/error)
│   ├── titulo-pagina.blade.php         # Título con gradiente
│   ├── sidebar-resultado.blade.php     # Panel de resultados genérico
│   └── nota-informativa.blade.php      # Nota al pie configurable
│
├── calculadora-aerea.blade.php     # Orquestador (~115 líneas)
├── calculadora-aerea/              # 📦 7 COMPONENTES
│   ├── tipo-servicio.blade.php         # Selector STANDARD/EXPRESS/CARGO
│   ├── rutas.blade.php                 # Aeropuertos origen/destino
│   ├── dimensiones.blade.php           # Peso y volumen
│   ├── calculadora-volumen.blade.php   # Mini calc de dimensiones
│   ├── valor-mercancia.blade.php       # Valor declarado
│   ├── servicio-urgente.blade.php      # Checkbox urgente (+30%)
│   └── botones-accion.blade.php        # Calcular/Limpiar
│
├── calculadora-terrestre.blade.php # Orquestador (~100 líneas)
├── calculadora-terrestre/          # 📦 6 COMPONENTES
│   ├── tipo-servicio.blade.php         # PARCIAL/COMPLETO/PALLETS
│   ├── rutas.blade.php                 # Ciudades origen/destino
│   ├── dimensiones.blade.php           # Peso, volumen, distancia
│   ├── calculadora-volumen.blade.php   # Mini calc de dimensiones
│   ├── valor-mercancia.blade.php       # Valor declarado
│   └── botones-accion.blade.php        # Calcular/Limpiar
│
├── calculadora-impuestos.blade.php # Orquestador (~95 líneas)
├── calculadora-impuestos/          # 📦 6 COMPONENTES
│   ├── categoria-producto.blade.php    # GENERAL/ALIMENTOS/TECNOLOGÍA/TEXTIL
│   ├── pais-origen.blade.php           # Campo país
│   ├── valores-cif.blade.php           # FOB + Flete + Seguro
│   ├── formula-cif.blade.php           # Tarjeta explicativa
│   ├── sidebar-resultado.blade.php     # Panel específico impuestos
│   └── botones-accion.blade.php        # Calcular/Limpiar
│
├── calculadora-maritima.blade.php  # Orquestador (~110 líneas)
├── calculadora-maritima/           # 📦 MÓDULO CON TABS
│   ├── tabs-navegacion.blade.php       # Selector LCL/FCL/ULD
│   ├── sidebar-resultado.blade.php     # Panel resultado marítimo
│   │
│   ├── lcl.blade.php                   # Sub-orquestador LCL
│   ├── lcl/                            # 7 componentes
│   │   ├── info-lcl.blade.php
│   │   ├── formulario-principal.blade.php
│   │   ├── servicios-adicionales.blade.php
│   │   ├── servicio-recojo.blade.php
│   │   ├── servicio-destino.blade.php
│   │   ├── calculadora-volumen.blade.php
│   │   └── botones-accion.blade.php
│   │
│   ├── fcl.blade.php                   # Sub-orquestador FCL
│   ├── fcl/                            # 10 componentes
│   │   ├── selector-puerto.blade.php
│   │   ├── tabla-tarifas.blade.php
│   │   ├── tabla-encabezado.blade.php
│   │   ├── tabla-contenido.blade.php
│   │   ├── tabla-paginacion.blade.php
│   │   ├── tabla-hint-movil.blade.php
│   │   ├── estado-vacio.blade.php
│   │   ├── estado-cargando.blade.php
│   │   ├── boton-limpiar.blade.php
│   │   └── estilos.blade.php
│   │
│   ├── uld.blade.php                   # Sub-orquestador ULD
│   └── uld/                            # 5 componentes
│       ├── formulario-principal.blade.php
│       ├── tipos-uld.blade.php
│       ├── caracteristicas-especiales.blade.php
│       ├── valor-mercancia.blade.php
│       └── botones-accion.blade.php
```

---

## 📝 Documentación de Componentes

Cada componente incluye un **header de documentación** en español:

```blade
{{-- 
    ============================================================
    COMPONENTE: [Nombre del Componente]
    ============================================================
    
    DESCRIPCIÓN:
    [Qué hace este componente]
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $variable: tipo - descripción
    
    MÉTODOS LIVEWIRE:
    - metodo(): descripción
    
    USO:
    @include('ruta.al.componente', ['prop' => $valor])
    ============================================================
--}}
```

---

## ✅ Beneficios Obtenidos

| Aspecto | Antes | Después |
|---------|-------|---------|
| **Líneas por archivo** | 250-280 | 80-115 |
| **Componentes compartidos** | 0 | 6 |
| **Código duplicado** | Alto | Mínimo |
| **Documentación** | Ninguna | En cada componente |
| **Facilidad de testing** | Difícil | Componentes aislados |
| **Onboarding nuevos devs** | Complejo | Estructura clara |

---

## 🔧 Patrón de Uso

### Archivo Orquestador (Principal)
```blade
<div class="min-h-screen bg-gradient-to-br...">
    @include('livewire.components.efectos-fondo')
    @include('livewire.components.header-calculadora')
    
    <div class="max-w-7xl mx-auto...">
        @include('livewire.components.titulo-pagina', [
            'titulo' => 'CALCULADORA',
            'subtitulo' => 'AÉREA',
            'descripcion' => 'Descripción...'
        ])
        
        @include('livewire.components.alertas-sesion')
        
        {{-- Componentes específicos --}}
        @include('livewire.calculadora-aerea.tipo-servicio')
        @include('livewire.calculadora-aerea.rutas')
        ...
    </div>
</div>
```

---

## 🚀 Próximos Pasos (Sugerencias)

1. **Componentes Blade Anónimos**: Migrar a `<x-componente>` syntax
2. **Tests Unitarios**: Crear tests para cada componente
3. **Storybook/Preview**: Documentación visual de componentes
4. **Caché de Vistas**: Optimizar con `php artisan view:cache`

---

## 👥 Equipo

- **Refactorización**: Asistido por GitHub Copilot
- **Fecha**: Diciembre 2024

---

*Este documento sirve como referencia para el equipo de desarrollo sobre la arquitectura de componentes implementada.*
