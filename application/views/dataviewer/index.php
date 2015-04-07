
<div class="row">
  <div class="col-sm-12">

   <div class="panel panel-primary" id="charts_env">

     <div class="panel-heading">
      <div class="panel-title">Site Stats</div>
    </div>

    <div class="panel-body" id="tables">

      <div ng-controller="customersCrtl">
       
          <div class="row">
            <div class="col-md-2">PageSize:
              <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
              </select>
            </div>
            <div class="col-md-3">Filter:
              <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
            </div>
            <div class="col-md-4">Data source URL:
              <input type="text" ng-model="url" ng-change="filter()" placeholder="URL" class="form-control" />
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-10" ng-show="filteredItems > 0">
              <table class="table table-striped table-bordered table-responsive">
                <thead>
                  <th ng-repeat="(key2, data) in filtered[0]">{{key2}}&nbsp;<a ng-click="sort_by('{{key2}}');"><i class="glyphicon glyphicon-sort"></i></a></th>
                </thead>
                <tbody>
                  <tr ng-repeat="(key,data) in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td ng-repeat="(key, datas) in data">
                    {{datas}}
                    </td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-12" ng-show="filteredItems == 0">
              <div class="col-md-12">
                <h4>No customers found</h4>
              </div>
            </div>
            <div class="col-md-12" ng-show="filteredItems > 0">    
              <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>


            </div>
          </div>
        </div>
      </div>



  </div>  

</div>



</div>