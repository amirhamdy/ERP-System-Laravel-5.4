<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Customer;
use App\Pricebook;
use App\Priceslist_Pricebook;
use App\Productline;
use App\Project;
use App\Job;
use App\JobType;
use App\Language;
use App\SubjectMatter;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class jobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Job::all();
        return view('jobs.index')->with(['jobs' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');
        $jobTypes = JobType::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $subjectMatters = SubjectMatter::pluck('name', 'id');
        return view('jobs.create', compact('customers', 'languages', 'jobTypes', 'units', 'subjectMatters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calculateJobPrice(Request $request)
    {
        $data = $request['arrayData'];

        $validator = Validator::make($data, [
            'productline_id' => 'required',
            'project_id' => 'required',
            'name' => 'required|unique:jobs|max:255',
            'job_type_id' => 'required',
            'amount' => 'required',
            'unit_id' => 'required',
            'source_language' => 'required',
            'target_language' => 'required',
            'subject_matter' => 'required',
        ]);

        if ($validator->fails()) {
            echo '
            <div class="alert alert-warning">
            <ul><li>Please provide all required information!</li></ul>
            <?php echo ?>
            </div>', $validator->errors();
            die();
        } else {
            echo '
            <div class="alert alert-success">
            <ul><li>Thanks!</li></ul>
            </div>';

            $productline_id = $data['productline_id'];
            $project_id = $data['project_id'];
            $name = $data['name'];
            $job_type_id = $data['job_type_id'];
            $amount = $data['amount'];
            $unit_id = $data['unit_id'];
            $source_language = $data['source_language'];
            $target_language = $data['target_language'];
            $subject_matter = $data['subject_matter'];

            $projectArray = Project::find($project_id);
            $project_name = $projectArray['name'];

            $productlineArray = Productline::find($productline_id);
            $pricebook_id = $productlineArray['pricebook_id'];

            if (!$pricebook_id) {
                ?>
                <div class="modal-header">
                    <h4 class="modal-title">
                        <?php
                        die("This productline doesn't have pricebook.");
                        ?>
                    </h4>
                </div>
                <?php
            } else {
                $priceslist = Priceslist_Pricebook::find_by_properties($pricebook_id, $unit_id, $job_type_id, $source_language, $target_language, $subject_matter);

                $unitArray = Unit::find($unit_id);
                $source_languageArray = Language::find($source_language);
                $target_languageArray = Language::find($target_language);
                $jobTypeArray = JobType::find($job_type_id);

                if (!$priceslist) {
                    echo "<div class='alert alert-danger'>"
                        . "- This pricebook does not have unit price for:<br/>"
                        . "<ul><br/>"
                        . "<li><b>Source Language</b>: " . $source_languageArray['name'] . "</li><br/>"
                        . "<li><b>Target Language</b>: " . $target_languageArray['name'] . "</li><br/>"
                        . "<li><b>Job Type</b>: " . $jobTypeArray['name'] . "</li><br/>"
                        . "<li><b>Job Unit</b>: " . $unitArray['name'] . "</li><br/>"
                        . "</ul>"
                        . "- Please add unit price to priceslist of this "
                        /*                        . "<b><a target='_blank'  href="{{ url('pricebooks/',$pricebook_id) }}">pricebook</a></b>"*/
                        . "</div>";
                    die();
                } else {

                }
            }


            die();
            $productlines = Productline::where('customer_id', "=", $id)->get();
            if ($productlines->isNotEmpty()) {
                foreach ($productlines as $productlineArray) {
                    ?>
                    <option value="<?php echo $productlineArray['id']; ?>"><?php echo $productlineArray['name']; ?></option>
                    <?php
                }
            } else {
                return "<option disabled>No productlines was found</option>";
            }

        }

        //die();

        /*        $minimum = $request->minimum;
                $free = $request->free;*/

    }

}
