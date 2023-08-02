<div class="col-md-2 mb-2">
    <div class="list-group">
        <a wire:navigate href="{{ route('home') }}" class="list-group-item list-group-item-action {{ request()->routeIs('home') ? 'active': '' }}" aria-current="true">
          Painel Home
        </a>
        <a wire:navigate href="{{ route('offices') }}" class="list-group-item list-group-item-action {{ request()->routeIs('offices') ? 'active': '' }}">Cargos</a>
        <a wire:navigate href="{{ route('departments') }}" class="list-group-item list-group-item-action {{ request()->routeIs('departments') ? 'active': '' }}">Departamentos</a>
        <a href="{{ route('companies') }}" class="list-group-item list-group-item-action {{ request()->routeIs('companies*') ? 'active': '' }}">Minhas Empresas</a>
        <a wire:navigate href="{{ route('experiences') }}" class="list-group-item list-group-item-action {{ request()->routeIs('experiences') ? 'active': '' }}">Nivel de experiência</a>
        <a wire:navigate href="{{ route('jobstype') }}" class="list-group-item list-group-item-action {{ request()->routeIs('jobstype') ? 'active': '' }}">Tipos de vaga </a>
        <a wire:navigate href="{{ route('contracttype') }}" class="list-group-item list-group-item-action {{ request()->routeIs('contracttype') ? 'active': '' }}">Tipo de contrato</a>
        <a wire:navigate href="{{ route('jobsrequested') }}" class="list-group-item list-group-item-action {{ request()->routeIs('jobsrequested') ? 'active': '' }}">Vagas Solicitadas</a>
        <a wire:navigate href="{{ route('reports') }}" class="list-group-item list-group-item-action {{ request()->routeIs('reports') ? 'active': '' }}">Relatórios</a>
    </div>
</div>
