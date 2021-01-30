<div class="list-group">
    <a href="/admin/questions" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-question"></i> Questions</a>
    <a href="/admin/user/edit/{{ Auth()->user()->slug }}" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-cogs"></i> Configure your profile</a>
    <a href="/admin/questions/create" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-plus"></i> Add Question({{Auth()->user()->role}})</a>
</div>