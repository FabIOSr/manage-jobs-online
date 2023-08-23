<div wire:ignore class="col-md-2 mb-2">
    <div class="list-group">
        <a wire:navigate href="{{ route('home') }}" class="list-group-item list-group-item-action {{ request()->routeIs('home') ? 'active': '' }}" aria-current="true">
          <i class="bi bi-speedometer2" style="font-size: 16px;"></i> Painel Home
        </a>
        <a wire:navigate href="{{ route('job.titles') }}" class="list-group-item list-group-item-action {{ request()->routeIs('job.titles*') ? 'active': '' }}"><i class="bi bi-files"></i> Cargos</a>
        <a wire:navigate href="{{ route('departments') }}" class="list-group-item list-group-item-action {{ request()->routeIs('departments*') ? 'active': '' }}"><i class="bi bi-files"></i> Departamentos</a>
        <a wire:navigate href="{{ route('experiences') }}" class="list-group-item list-group-item-action {{ request()->routeIs('experiences*') ? 'active': '' }}"><i class="bi bi-file-earmark-person" style="font-size: 14px;"></i> Experiência</a>
        <a href="{{ route('companies') }}" class="list-group-item list-group-item-action {{ request()->routeIs('companies*') ? 'active': '' }}"><i class="bi bi-house"></i> Minhas Empresas</a>
        <a wire:navigate href="{{ route('vacancies') }}" class="list-group-item list-group-item-action {{ request()->routeIs('vacancies*') ? 'active': '' }}"><i class="bi bi-file-earmark-pdf" style="font-size: 14px;"></i> Tipos de vaga </a>
        <a wire:navigate href="{{ route('contract-types') }}" class="list-group-item list-group-item-action {{ request()->routeIs('contract-types*') ? 'active': '' }}"><i class="bi bi-card-checklist" style="font-size: 16px;"></i> Tipo de contrato</a>
        <a wire:navigate href="{{ route('vagas.solicitadas') }}" class="list-group-item list-group-item-action {{ request()->routeIs('vagas.*') ? 'active': '' }}"><i class="bi bi-filetype-doc" style="font-size: 14px;"></i> Vagas Solicitadas</a>
        <a wire:navigate href="{{ route('reports') }}" class="list-group-item list-group-item-action {{ request()->routeIs('reports') ? 'active': '' }}"><i class="bi bi-graph-up"></i> Relatórios</a>
    </div>
</div>
