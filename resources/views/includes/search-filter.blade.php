<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    dataTable = () => {
        return {
            showFilters: false,
            table: null,
            searchValue: '',
            indices: @json(isset($index) ? $index : array()),

            init () {
                this.table = $('#{{$table}}').DataTable();
                $("#table_filter")[0].style.display = "none";
                $("#table_length")[0].style.display = "none";
            },
            
            toggleFilters() {
                if(this.showFilters == false) {
                    this.showFilters = true;
                } else {
                    this.showFilters = false;
                }
            },

            search(){
                this.table.search(this.searchValue).draw();
            },

            filterTable(filter, value) {      
                filter = this.indices[filter];          
                value != 'all' ? this.table.column(filter).search(value).draw() : this.table.column(filter).search('').draw();
            },

            resetFilters() {
                this.table.columns().search('').draw();
            }
        }
    }
</script>

<div class="my-2 col d-flex align-items-center search-bar" x-data="dataTable()" x-init="init()">
    @if(isset($search) && $search == true)
        <div class="search">
            <div class="relative">
                <span class="s-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input x-model="searchValue" x-on:keyup="search()" x-on:change="search()" x-on:search="search()"
                       class="form-control" type="search" placeholder="{{$placeholder}}" autocomplete="off">  
            </div>
        </div>
    @endif
    @if(isset($filters))
        <div class="filter">
            <div class="btn-div">
                <button @click="toggleFilters()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke="rgb(48 86 211)" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </button>
            </div>        
            <div class="filter-dropdown" x-show="showFilters == true">
                <div class="dropdown-body">
                    <div class="body">    
                        @foreach ($filters as $name => $values)                                             
                            <div class="filter-item">
                                <div class="filter-body">
                                    <div class="heading">
                                        <label class="h4">
                                            <strong>{{$name}}</strong>
                                        </label>
                                    </div>
                                    <div class="filter">
                                        <div>
                                            <select name="filter" x-on:change="filterTable('{{$name}}', $event.target.value)">
                                                <option value="all" selected>All</option>
                                                @foreach ($values as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="footer">
                        <button x-on:click="resetFilters()">
                            Reset filters
                        </button>
                    </div>
                </div>
            </div>        
        </div>
    @endif
</div>