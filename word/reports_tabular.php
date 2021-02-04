<?php
  
  include("api.php");
   session_start();
  $_SESSION["uid"];

$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

include("header.php");

?>
            <!-- BEGIN: Datatable -->
            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <div class="overflow-x-auto">
                <div class="preview">
                
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                        
                            
                            <table
                                class="table table-report table-report--bordered display datatable w-full dataTable no-footer dtr-inline"
                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                style="width: 806px;">
                                <thead>
                                    <tr role="row">
                                        <th class="border-b-2 whitespace-no-wrap sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 166px;" aria-sort="ascending"
                                            aria-label="PRODUCT NAME: activate to sort column descending">MSISDN
                                        </th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 80px;" aria-label="IMAGES: activate to sort column ascending">
                                            FROM MESSAGE</th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 124px;"
                                            aria-label="REMAINING STOCK: activate to sort column ascending">FROM DATE</th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 120px;"
                                            aria-label="STATUS: activate to sort column ascending">TO MESSAGE</th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 116px;"
                                            aria-label="ACTIONS: activate to sort column ascending">TO DATE</th>
                                    </tr>
                                </thead>
                                <tbody>










                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">11/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">222222222</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">12/06/2020</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">33333333</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AYAYAYAYA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">44444</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AVAVAVAVA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">55555555</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAAAXAXAXAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">6666666666666666</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA BBBBBBBBBBB</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">11!@!@!@!@!@@@</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">GGGGGGG AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">87f8f987efhje</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA kejfkefek</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">8758758578</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAA87484 874y274 74A</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">77647576557567</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAA wyey 3ruhu AAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="intro-y datatable-wrapper box p-5 mt-5">
                <div class="p-5" id="striped-rows-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="DataTables_Table_0"></label></div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 whitespace-no-wrap">MSISDN</th>
                                        <th class="border-b-2 whitespace-no-wrap">FROM MESSAGE</th>
                                        <th class="border-b-2 whitespace-no-wrap">FROM DATE</th>
                                        <th class="border-b-2 whitespace-no-wrap">TO MESSAGE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-gray-200">
                                        <td class="border-b">9999999999</td>
                                        <td class="border-b">Hai this is 9999999999</td>
                                        <td class="border-b">10-06-2020</td>
                                        <td class="border-b">Are you 8888888888 </td>
                                    </tr>
                                    <tr>
                                        <td class="border-b">8888888888</td>
                                        <td class="border-b">Hai this is 8888888888</td>
                                        <td class="border-b">10-06-2020</td>
                                        <td class="border-b">Are you 7777777777 </td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border-b">7777777777</td>
                                        <td class="border-b">Hai this is 7777777777</td>
                                        <td class="border-b">10-06-2020</td>
                                        <td class="border-b">Are you 9999999999</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div> -->
            <!-- END: Datatable -->
        </div>
    </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->

<?php
  

include("footer.php");
   ?>