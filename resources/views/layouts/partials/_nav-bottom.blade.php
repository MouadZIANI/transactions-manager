<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            @if (auth()->user()->role == 'client')
                <div class="col-lg order-lg-first">
                    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                        <li class="nav-item">
                            <a href="{{ route('client.pages.dashbaord') }}" class="nav-link"><i class="fe fe-home"></i> Tableau de board</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transactions.index') }}" class="nav-link"><i class="fe fe-bell"></i> Mes Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transactions.create') }}" class="nav-link"><i class="fe fe-plus-circle"></i>Nouvelle Transaction</a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="col-lg order-lg-first">
                    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.dashbaord') }}" class="nav-link"><i class="fe fe-home"></i> Tableau de board</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('clients.create') }}" class="nav-link"><i class="fe fe-plus-circle"></i>Nouveau client</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('clients.index') }}" class="nav-link"><i class="fe fe-bell"></i> Liste des clients</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link"><i class="fe fe-plus-circle"></i>Nouveau utilisateur</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link"><i class="fe fe-bell"></i> Liste des utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.transactions') }}" class="nav-link"><i class="fe fe-bell"></i> Liste des transactions</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>