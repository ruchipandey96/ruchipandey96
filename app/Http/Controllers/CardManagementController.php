<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\CardModel;
use DB;
use Validator;
/**
 * ------------------------------------------------------------------------
 *   CardManagementController class
 * ------------------------------------------------------------------------
 * Controller having methods to handle requests,
 * details. This class consists of
 * methods to show request form, show request details.
 *
 *
 * @package  App\Http\Controllers
 * @version  6.2
 * @author   Ruchi pandey.
 */

class CardManagementController extends Controller
{
	public function index(){
		$getCards=DB::table('card_management')->where('deleted_at',NULL)->where('status','1')->get(); 
		return view('cardList')->with('getCards',$getCards);
	}
    
    //-------------------------------------------------------------------------
	/**
     *  To Create the cardForm. 
     *
     * @access  public
     * @param   Illuminate\Http\Request $request
     * @return  View Page
     * @author  Ruchi pandey.
     */
	public function cardForm(){
		return view('cardForm');
	}

     //-------------------------------------------------------------------------
	/**
     *  To Store the Card Data. 
     *
     * @access  public
     * @param   Illuminate\Http\Request $request
     * @return  Response
     * @author  Ruchi pandey.
     */
	public function storeCardData(Request $request)
    {		
    	try
            {
                Log::info('CardManagement controller: To Create a card::Start');
                $data=$request->all();
                 if ($request->hasFile('displayPhoto')) {
                  $displayPhoto = $request->file('displayPhoto');
                  $name = time().'.'.$displayPhoto->getClientOriginalName();
                  $destinationPath = public_path('/displayPhotos');
                  $displayPhoto->move($destinationPath, $name);
                  $data['displayPhoto'] = $name ;
                  }
                  else{
                    $data['displayPhoto'] = '';
                  }
               $validator             =    Validator::make($request->all(),[
                'personName'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',
                'designation'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',
                'businessName'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',
                'shortDescription'         =>   'required|regex:/^[a-zA-Z]{1}/|max:151',
                'whatsAppNumber'         =>   'required|max:10',
                'contacts'         =>   'required|max:10',
                'singleAddress'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',

               ]);
                if(!$validator->fails())
                {   
                	 DB::beginTransaction();
                 $store =array( 
                     'personName'        =>  $data['personName'],
                     'designation'       =>  $data['designation'],
                     'businessName'      =>  $data['businessName'],
                     'shortDescription'  =>  $data['shortDescription'],
                     'displayPhoto'      =>  $data['displayPhoto'],
                     'whatsAppNumber'    =>  $data['whatsAppNumber'],
                     'contacts'          =>  $data['contacts'],
                     'singleAddress'     =>  $data['singleAddress'],
                     'status'            => '1',
                     'created_at'         => date('Y-m-d h:i:s'),
                 );
              $storeEvent=CardModel::create($store); 
                 DB::commit(); 
                }
                else
                {
                   return back()->withErrors($validator->errors())->withInput();
                }
                return redirect('cardList');
                Log::info('CardManagement controller: To Create a card::End');
        }
            catch (QueryException $e) 
               
            {
                Log::error('CardManagement controller: To Create a card::Error'.$e->getMessage());
                return view('errors.custom');
            }   
    }
       //-------------------------------------------------------------------------
	/**
     *  To View the Card Data. 
     *
     * @access  public
     * @param   Illuminate\Http\Request $request
     * @return  Response
     * @author  Ruchi pandey.
     */
    public function viewCard(Request $request){
    	try
         {
         Log::info('CardManagement controller: To View Card::Start');
    	$id=$request->all();
    	$data=DB::table('card_management')->where('id',$id)->first();
    	  Log::info('CardManagement controller: To View Card::End');
    	return view('viewCard')->with('data',$data);
	     }
        catch (QueryException $e) 
        {
          Log::error('CardManagement controller: To View Card::Error'.$e->getMessage());
          return view('errors.custom');
        }

    } 
      //-------------------------------------------------------------------------
	/**
     *  To Edit the Card Data. 
     *
     * @access  public
     * @param   Illuminate\Http\Request $request
     * @return  Response
     * @author  Ruchi pandey.
     */
    public function editCard(Request $request){
    	try
         {
          Log::info('CardManagement controller: To Edit Card::Start');
	    	$id=$request->all();
	    	$data=DB::table('card_management')->where('id',$id)->first();
	      Log::info('CardManagement controller: To Edit Card::End');
			return view('editCard')->with('data',$data);
	     }
        catch (QueryException $e) 
        {
          Log::error('CardManagement controller: To Edit Card::Error'.$e->getMessage());
          return view('errors.custom');
        }

    }  
     //-------------------------------------------------------------------------
	/**
     *  To Delete the Card by id. 
     *
     * @access  public
     * @param   Illuminate\Http\Request $request
     * @return  Response
     * @author  Ruchi pandey.
     */
    public function deleteCard(Request $request){
    	try
         {
          Log::info('CardManagement controller: To Delete Card::Start');
	    	$id=$request->all();
	    	$card_model = new CardModel();
    	    $deleted=$card_model->deleteById($id);
    	    if(!$deleted){
    	    	session()->flash('errors', 'Card is Not Deleted');
    	    	return redirect('cardList');
    	    }
    	  Log::info('CardManagement controller: To Delete Card::End');
    	  session()->flash('errors', 'Card  Deleted Successfully');
    	 return redirect('cardList');
        }
         catch (QueryException $e) 
            {
              Log::error('CardManagement controller: To Delete Card::Error'.$e->getMessage());
              return view('errors.custom');
            }
    }
     //-------------------------------------------------------------------------
	/**
     *  To Update the Card Data. 
     *
     * @access  public
     * @param   Illuminate\Http\Request $request
     * @return  Response
     * @author  Ruchi pandey.
     */
    public function updateCard(Request $request){
    	try
            {
                Log::info('CardManagement controller: To Update Card Data::Start');
                $data=$request->all();
                $id=$data['id'];
                $validator             =    Validator::make($request->all(),[
                'personName'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',
                'designation'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',
                'businessName'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',
                'shortDescription'         =>   'required|regex:/^[a-zA-Z]{1}/|max:151',
                'whatsAppNumber'         =>   'required|max:10',
                'contacts'         =>   'required|max:10',
                'singleAddress'         =>   'required|regex:/^[a-zA-Z]{1}/|max:100',

               ]);
                if(!$validator->fails())
                { 
                DB::beginTransaction();
                 $update =array( 
                     'personName'        =>  $data['personName'],
                     'designation'       =>  $data['designation'],
                     'businessName'      =>  $data['businessName'],
                     'shortDescription'  =>  $data['shortDescription'],
                     'displayPhoto'      =>  $data['displayPhoto'],
                     'whatsAppNumber'    =>  $data['whatsAppNumber'],
                     'contacts'          =>  $data['contacts'],
                     'singleAddress'     =>  $data['singleAddress'],
                     'status'            => '1',
                     'updated_at'         => date('Y-m-d h:i:s'),
                 );
              $storeEvent=CardModel::where('id',$id)->update($update); 
                 DB::commit(); 
                  }
                else
                {
                   return back()->withErrors($validator->errors())->withInput();
                }
                return redirect('cardList');
                Log::info('CardManagement controller: To Update Card Data::End');
       	    }
            catch (QueryException $e) 
               
            {
                Log::error('CardManagement controller: To Update Card Data::Error'.$e->getMessage());
                return view('errors.custom');
            }
    }
}
