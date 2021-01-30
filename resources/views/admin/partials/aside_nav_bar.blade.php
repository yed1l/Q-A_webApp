<div class="list-group">
    <a href="/admin/questions" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-question"></i> Preguntas</a>
    <a href="/admin/user/edit/{{ Auth()->user()->slug }}" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-cogs"></i> Configuración</a>
    <a href="/admin/questions/create" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-plus"></i> Crear pregunta({{Auth()->user()->role}})</a>
</div>