<?php
foreach($_POST as $variable => $value)
$$variable = $value;


if (isset($cmd) &&  $cmd=== 'create_templates') {
  $nlanguages=explode("-",$languages);
  $nlanguages_id=explode("-",$languages_id);

echo '<div class="mt-2  border-t border-gray-200 dark:border-dark-5">
    
                            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                                   <div class="col-span-12 lg:col-span-3 xxl:col-span-3 flex lg:block flex-col-reverse">
                                         <div class="intro-y box mt-5">
                                            <div class="relative flex items-center p-5">
                                            
                                                <div class="ml-4 mr-auto">
                                                    <div class="font-medium text-base">Languages selected</div>
                                                    
                                                </div>
                                            
                                            </div>
                                        
                                        <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                            <div>';
                                            $i=0;
                                            foreach($nlanguages as $rlanguages){
                                                if($i==0){
                                                    echo '<div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> <input type="radio" class="input border mr-2" id="vertical-radio-chris-evans" name="language_radio_button" value="'.$nlanguages_id[$i].'" onclick="language_change();"  checked> <label class="cursor-pointer select-none" for="vertical-radio-'.$rlanguages.'">'.$rlanguages.'</label> </div>';
                                                }else{
                                                    echo '<div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> <input type="radio" class="input border mr-2" id="vertical-radio-chris-evans" name="language_radio_button" value="'.$nlanguages_id[$i].'" onclick="language_change();"> <label class="cursor-pointer select-none" for="vertical-radio-'.$rlanguages.'">'.$rlanguages.'</label> </div>';
                                                }
                                                $i++;
                                                
                                            }
                                                
                                        echo '</div>  
                                        </div>
                                       
                                    </div> 
                                    
                                </div>';
                                $j=0;
                                foreach($nlanguages as $rlanguages){
                                    if($j==0){
                                        echo '<div class="col-span-12 lg:col-span-9 xxl:col-span-9 sel_lag" id="'.$nlanguages_id[$j].'" >';
                                    }else{
                                        echo '<div class="col-span-12 lg:col-span-9 xxl:col-span-9 sel_lag" id="'.$nlanguages_id[$j].'" style="display:none;">';
                                    }
                                 
                                   echo  '<!-- begin header -->
                                    <div class="intro-y box lg:mt-5">
                                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                '.$rlanguages.'
                                            </h2>
                                           </div>
                                        <div class="p-2">
                                            <div class="flex flex-col sm:flex-row items-center"> <label class="w-100 sm:w-100 sm:text-right sm:mr-5">Select Header Type</label>
                                                <select id="headerselector'.$nlanguages_id[$j].'" onchange="header_change(this);" class="input input border mr-2 w-80 headerselector" data-id="'.$nlanguages_id[$j].'">
                                                    <option></option>
                                                    <option value="text">Text</option>
                                                    <option value="media">Media</option>
                                                </select>
                                                </div>
                                            <div class="mt-2"> 
                                                <div class="output">
                                                    <div id="text'.$nlanguages_id[$j].'" class="header-'.$nlanguages_id[$j].'" style="display: none;"> 
                                                        <div class="flex flex-col sm:flex-row items-center"> <label class="w-full sm:w-20 sm:text-right sm:mr-5">Header(Text)</label> <input type="text" id="headertxt'.$nlanguages_id[$j].'" maxlength="20" class="input w-full border mt-2 flex-1" placeholder="Header"> </div>
                                                        </div>
                                                    <div id="media'.$nlanguages_id[$j].'" class="header-'.$nlanguages_id[$j].'" style="display: none;">
                                                       </br>
                                                    <div class="flex flex-col sm:flex-row items-center"> <label class="w-100 sm:w-100 sm:text-right sm:mr-5">Select Media Type</label>
                                                         <select class="input input border mr-2 w-80 headerselector media'.$nlanguages_id[$j].'">
                                                         <option value="0">Select Media</option>
                                                          <option value="1">Image</option>
                                                          <option value="2">Video</option>
                                                          <option value="3">Document</option>
                                                         </select>
                                                            <!--<div class=" flex items-center cursor-pointer relative">
                                                                <div class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box dark:bg-dark-5 text-center sm:mx-2 "> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image mx-auto"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Image </div>
                                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0 media'.$nlanguages_id[$j].' data-id="image"">
                                                            </div>
                                                            <div class=" flex items-center cursor-pointer relative">
                                                                <div class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box dark:bg-dark-5 text-center sm:mx-2 "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video mx-auto"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>  Vedio </div>
                                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0 media'.$nlanguages_id[$j].'" data-id="video">
                                                            </div>
                                                            <div class=" flex items-center cursor-pointer relative">
                                                                <div class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box dark:bg-dark-5 text-center sm:mx-2 ">  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mx-auto"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Document</div>
                                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0 media'.$nlanguages_id[$j].'" data-id="document">
                                                            </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                        </div>
                                        </div>
                                    </div>
                                    <!-- end header -->
                                    <!-- begin body  -->
                                    <div class="intro-y box lg:mt-5">
                                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                Body
                                            </h2>
                                             </div>
                                        <div class="p-2">
                                            <div class="container">
                                               
                                              <div class="row align-items-center justify-content-center">
                                                <div class="col-md-12 col-lg-8">    
                                                        <div class="editor" id="editor-1">
                                                  <div class="toolbar">
                                                    <a href="#" data-command="undo" data-toggle="tooltip" data-placement="top" title="Undo"><i class="fa fa-undo"></i></a>
                                                    <a href="#" data-command="redo" data-toggle="tooltip" data-placement="top" title="Redo"><i class="fa fa-redo "></i></a>
                                                            <a href="#" data-command="removeFormat" data-toggle="tooltip" data-placement="top" title="Clear format"><i class="fa fa-times "></i></a>
                                                    <div class="fore-wrapper"><i class="fa fa-font" data-toggle="tooltip" data-placement="top" title="text color" style="color:#C96;"></i>
                                                      <div class="fore-palette">
                                                      <a href="#" data-command="foreColor" data-value="#000000" style="background-color:#000000;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#FF9966" style="background-color:#FF9966;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#6699FF" style="background-color:#6699FF;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#99FF66" style="background-color:#99FF66;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#CC0000" style="background-color:#CC0000;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#00CC00" style="background-color:#00CC00;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#0000CC" style="background-color:#0000CC;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#333333" style="background-color:#333333;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#0066FF" style="background-color:#0066FF;" class="palette-item"></a><a href="#" data-command="foreColor" data-value="#FFFFFF" style="background-color:#FFFFFF;" class="palette-item"></a></div>
                                                    </div>
                                                    <div class="back-wrapper"><i class="fa fa-font" data-toggle="tooltip" data-placement="top" title="Background color" style="background:#C96;"></i>
                                                      <div class="back-palette">
                                                      <a href="#" data-command="backColor" data-value="#000000" style="background-color:#000000;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#FF9966" style="background-color:#FF9966;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#6699FF" style="background-color:#6699FF;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#99FF66" style="background-color:#99FF66;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#CC0000" style="background-color:#CC0000;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#00CC00" style="background-color:#00CC00;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#0000CC" style="background-color:#0000CC;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#333333" style="background-color:#333333;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#0066FF" style="background-color:#0066FF;" class="palette-item"></a><a href="#" data-command="backColor" data-value="#FFFFFF" style="background-color:#FFFFFF;" class="palette-item"></a></div>
                                                    </div>
                                                    <a href="#" data-command="bold" data-toggle="tooltip" data-placement="top" title="Bold"><i class="fa fa-bold"></i></a>
                                                    <a href="#" data-command="italic" data-toggle="tooltip" data-placement="top" title="Italic"><i class="fa fa-italic"></i></a>
                                                    <a href="#" data-command="underline" data-toggle="tooltip" data-placement="top" title="Underline"><i class="fa fa-underline"></i></a>
                                                    <a href="#" data-command="strikeThrough" data-toggle="tooltip" data-placement="top" title="Stike through"><i class="fa fa-strikethrough"></i></a>
                                                    <a href="#" data-command="justifyLeft" data-toggle="tooltip" data-placement="top" title="Left align"><i class="fa fa-align-left"></i></a>
                                                    <a href="#" data-command="justifyCenter"><i class="fa fa-align-center" data-toggle="tooltip" data-placement="top" title="Center align"></i></a>
                                                    <a href="#" data-command="justifyRight" data-toggle="tooltip" data-placement="top" title="Right align"><i class="fa fa-align-right"></i></a>
                                                    <a href="#" data-command="justifyFull" data-toggle="tooltip" data-placement="top" title="Justify"><i class="fa fa-align-justify"></i></a>
                                                    <a href="#" data-command="indent" data-toggle="tooltip" data-placement="top" title="Indent"><i class="fa fa-indent"></i></a>
                                                    <a href="#" data-command="outdent" data-toggle="tooltip" data-placement="top" title="Outdent"><i class="fa fa-outdent"></i></a>
                                                    <a href="#" data-command="insertUnorderedList" data-toggle="tooltip" data-placement="top" title="Unordered list"><i class="fa fa-list-ul"></i></a>
                                                    <a href="#" data-command="insertOrderedList" data-toggle="tooltip" data-placement="top" title="Ordered list"><i class="fa fa-list-ol"></i></a>
                                                    <a href="#" data-command="h1" data-toggle="tooltip" data-placement="top" title="H1">H1</a>
                                                    <a href="#" data-command="h2" data-toggle="tooltip" data-placement="top" title="H2">H2</a>
                                                    <a href="#" data-command="createlink" data-toggle="tooltip" data-placement="top" title="Inser link"><i class="fa fa-link"></i></a>
                                                    <a href="#" data-command="unlink" data-toggle="tooltip" data-placement="top" title="Unlink"><i class="fa fa-unlink"></i></a>
                                                    <a href="#" data-command="insertimage" data-toggle="tooltip" data-placement="top" title="Insert image"><i class="fa fa-image"></i></a>
                                                    <a href="#" data-command="p" data-toggle="tooltip" data-placement="top" title="Paragraph">P</a>
                                                    <a href="#" data-command="subscript" data-toggle="tooltip" data-placement="top" title="Subscript"><i class="fa fa-subscript"></i></a>
                                                    <a href="#" data-command="superscript" data-toggle="tooltip" data-placement="top" title="Superscript"><i class="fa fa-superscript"></i></a>
                                                  </div>
                                                  <div id="editor'.$nlanguages_id[$j].'" class="editorAria" contenteditable="">
                                                     </div>
                                                            </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                        <!-- end body -->
                                        <!-- begin Footer -->
                                    <div class="intro-y box lg:mt-5">
                                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                               Footer 
                                            </h2>
                                           </div>
                                        <div class="p-2">
                                            <div>  <input type="text" id="footer'.$nlanguages_id[$j].'" class="input w-full border mt-2" placeholder="Footer"> </div>
                                            
                                        </div>
                                    </div>
                                    <!-- end footer --> 
                                         <!-- begin button -->
                                         <div class="intro-y box lg:mt-5">
                                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                <h2 class="font-medium text-base mr-auto">
                                                   Button 
                                                </h2>
                                               </div>
                                               <div class="p-2">
                                     
                                                <div class="flex flex-col sm:flex-row items-center"> <label class="w-100 sm:w-100 sm:text-right sm:mr-5">Select Button Type</label>
                                                    <select id="buttonselector'.$nlanguages_id[$j].'" onchange="button_selector(this);" data-id="'.$nlanguages_id[$j].'" class="input input border mr-2 w-80">
                                                        <option value="">None</option>
                                                        <option value="calltoaction">Call To Action</option>
                                                        <option value="quickreply">Quick Reply</option>
                                                    </select>
                                                    
                                       
                                                    </div>
                                                <div class="mt-2"> 
                                                    <div class="output">
                                                       <!-- begin callto action -->
                                                       <div id="calltoaction'.$nlanguages_id[$j].'" class="buttonform'.$nlanguages_id[$j].'" style="display: none;"> 
                                                      
                                                            <section class="container">
                                                            <div class="table table-responsive">
                                                            <div class="flex flex-col sm:flex-row items-center">
                                                                    <div>
                                                                     <label>Phone/Website</label> 
                                                                     <select class="input border mr-2 clt'.$nlanguages_id[$j].'">
                                                                        <option value="CallPhone">Call Phone</option>
                                                                        <option value="VisitWebsite">Visit Website</option>
                                                                    </select> 
                                                                    </div> 
                                                                    <div class="mr-2"> 
                                                                      <label>Text</label> 
                                                                      <input type="text" class="input w-full border clttext'.$nlanguages_id[$j].'" placeholder="Button Text"> 
                                                                    </div>
                                                                    <div>
                                                                        <label>Type</label> 
                                                                        <select class="input  border mr-2 cltsel'.$nlanguages_id[$j].'">
                                                                           <option value="Static">Static</option>
                                                                           <option value="Dynamic">Dynamic</option>
                                                                       </select> 
                                                                       </div> 
                                                                       <div> 
                                                                         <label>Website URL</label> 
                                                                         <input type="text" class="input w-full border clturl'.$nlanguages_id[$j].'" placeholder="Website URL"> 
                                                                       </div>
    
                                                                </div><table class="table table-responsive table-striped table-bordered">
                                                            
                                                            <tbody id="calltoactionContainer'.$nlanguages_id[$j].'">
                                                                
                                                            </tbody>
                                                            
                                                            <tfoot>
                                                              <tr>
                                                                <th colspan="5">
                                                                <button id="calltoactionbtn'.$nlanguages_id[$j].'" onclick="add_calltoaction(this)" type="button" data-cnt=0 data-id="'.$nlanguages_id[$j].'" class="button  justify-center block bg-theme-1 text-white" data-toggle="tooltip" data-original-title="Add more controls">Add Another Button</button></th>
                                                              </tr>
                                                            </tfoot>
                                                            </table>
                                                            </div>
                                                            </section>
                                                    </div>
                                                    

                                                    <!-- end calltoaction -->
                                                        <!-- begin quick reply -->
                                                        <div id="quickreply'.$nlanguages_id[$j].'" class="buttonform" style="display: none;"> 
                                                            <div class="flex flex-col sm:flex-row items-center"> <label class="w-full sm:w-20 sm:text-right sm:mr-5">Button(Text)</label> <input type="text" maxlength="20" class="input w-full border mt-2 flex-1 quicktext'.$nlanguages_id[$j].'" placeholder="Header"> </div>
                                                            <section class="container">
                                                                <div class="table table-responsive">
                                                                <table class="table table-responsive table-striped table-bordered">
                                                                
                                                                <tbody id="TextBoxContainer'.$nlanguages_id[$j].'">
                                                                </tbody>
                                                                <tfoot>
                                                                  <tr>
                                                                    <th colspan="5">
                                                                    <button id="btnAdd'.$nlanguages_id[$j].'" onclick="addanotherbox(this)" data-cnt=0 data-id="'.$nlanguages_id[$j].'" type="button" class="button  justify-center block bg-theme-1 text-white" data-toggle="tooltip" data-original-title="Add more controls">Add Another Textbox</button></th>
                                                                  </tr>
                                                                </tfoot>
                                                                </table>
                                                                </div>
                                                                </section>
                                                        </div>
                                                          
                                                        <!-- end quick reply -->
                                                        
                                                        </div>
                                                      
                                            </div>
                                            </div>
                                        </div>
                                        <!-- end Button -->
                                    
                                </div>
                               
                                ';
                                $j++;
                                }
                                
                              
                              


  echo '<div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
            <button class="button w-24 justify-center block bg-gray-200 text-gray-600 dark:bg-dark-1 dark:text-gray-300" id="prevbtn">Previous</button>
            <button class="button w-24 justify-center block bg-theme-1 text-white ml-2" onclick="submit_template();">Submit</button>
            </div>
            </div>
            </div>';
} 
?>