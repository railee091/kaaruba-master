<x-admin />
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li>Memberlist</li>
      </ol>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <div class="card">
          <div class="col-sm-12">
            <div class="card-header">
              Listing all members
            </div>
            <div class="card-body">
              <table class="table" id="table_id">
                <thead>
                  <tr>
                    <th scope="col">Member ID</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Tin</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($members as $member)
                  <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->middle_name }}</td>
                    <td>{{ $member->tax_identification_number }}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#option-modal-{{ $member->id }}" {{ isset($member->terminates) ? 'disabled' : '' }}> {{ isset($member->terminates) ? 'Edit' : 'Edit' }}</button>
                      <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#option2-modal-{{ $member->id }}">View</button>
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#option3-modal-{{ $member->id }}" {{ isset($member->terminates) ? 'disabled' : '' }}> {{ isset($member->terminates) ? 'Terminated' : 'Terminate' }}</button>

                      <!---==================================================================================foreach modals start here======================================================================-->



                      <!-- Modal Edit start-->
                      <div class="modal fade" id="option-modal-{{ $member->id }}" tabindex="-1" aria-labelledby="option-modal-{{ $member->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <form method="POST" action="updateMemberDetails">
                              @csrf
                              <input type="hidden" name="member_id" value="{{ $member->id }}" />
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Member Information ({{ $member->id }}-{{ $member->first_name }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab-{{ $member->id }}" data-bs-toggle="tab" data-bs-target="#home-{{ $member->id }}" type="button" role="tab" aria-controls="home-{{ $member->id }}" aria-selected="true">Profile</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab-{{ $member->id }}" data-bs-toggle="tab" data-bs-target="#profile-{{ $member->id }}" type="button" role="tab" aria-controls="profile-{{ $member->id }}" aria-selected="false">Details</button>
                                  </li>
                                </ul>
                                <div class="tab-content" id="myTabContent-{{ $member->id }}">
                                  <!--profile tab-->

                                  <div class="tab-pane fade show active" id="home-{{ $member->id }}" role="tabpanel" aria-labelledby="home-tab-{{ $member->id }}">
                                    <div class="row mb-3">
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Date Accepted</label>
                                        <input type="date" class="form-control" id="date_accepted" name="date_accepted" value="{{ isset($member->profile->date_accepted) ? $member->profile->date_accepted : '' }}">
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Resolution Number</label>
                                        <input type="text" class="form-control" id="resolution_number" name="resolution_number" value="{{ isset($member->profile->resolution_number) ?  $member->profile->resolution_number : ''}}"">
                                        </div>
                                        <div class=" col">
                                        <label for="exampleInputEmail1" class="form-label">Membership Type</label>
                                        <input type="text" class="form-control" id="type" name="type" value="{{ isset($member->type->id) ? $member->type->id : ''}}">
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Shares Subscribed</label>
                                        <input type="number" class="form-control" id="shares_subscribed" name="shares_subscribed" value="{{ isset($member->profile->shares_subscribed) ? $member->profile->shares_subscribed : '1200' }}">
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Amount Subscribed</label>
                                        <input type="number" class="form-control" id="amount_subscribed" name="amount_subscribed" value="{{ isset($member->profile->amount_subscribed) ? $member->profile->amount_subscribed : ''}}">
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Initial Paid up</label>
                                        <input type="number" class="form-control" id="initial_paid_up" name="initial_paid_up" value="{{ isset($member->profile->initial_paid_up) ? $member->profile->initial_paid_up : ''}}">
                                      </div>
                                    </div>


                                  </div>

                                  <!--Details tab-->
                                  <div class="tab-pane fade" id="profile-{{ $member->id }}" role="tabpanel" aria-labelledby="profile-tab-{{ $member->id }}">
                                    <div class="row mb-3">
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ isset($member->details->address) ?  $member->details->address : '' }}">
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ isset($member->details->date_of_birth) ? $member->details->date_of_birth : ''}}">
                                      </div>
                                      <!-- <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="age" name="age" value="{{ isset($member->details->age) ? $member->details->age : '' }}">
                                      </div> -->
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Gender</label>
                                        <input type="text" class="form-control" id="gender" name="gender" value="{{ isset($member->details->gender) ? $member->details->gender : '' }}">
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Civil Status</label>
                                        <input type="text" class="form-control" id="civil_status" name="civil_status" value="{{ isset($member->details->civil_status) ? $member->details->civil_status : '' }}">
                                      </div>
                                    </div>

                                    <hr />

                                    <div class="row mb-3">
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Educational Attainment</label>
                                        <input type="text" class="form-control" id="educational_attainment" name="educational_attainment" value="{{ isset($member->details->educational_attainment) ? $member->details->educational_attainment : '' }}">
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{ isset($member->details->occupation) ? $member->details->occupation : ''}}">
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <div class="col-2">
                                        <label for="exampleInputEmail1" class="form-label">Dependents</label>
                                        <input type="text" class="form-control" id="dependents" name="dependents" value="{{ isset($member->details->dependents) ? $member->details->dependents : '' }}">
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label">Annual Income</label>
                                        <input type="number" class="form-control" id="annual_income" name="annual_income" value="{{ isset($member->details->annual_income) ? $member->details->annual_income : '' }}">
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Religion</label>
                                        <input type="text" class="form-control" id="religion" name="religion" value="{{ isset($member->details->religion) ? $member->details->religion : '' }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Modal edit end -->
                      <!-- Modal View start-->
                      <div class="modal fade" id="option2-modal-{{ $member->id }}" tabindex="-1" aria-labelledby="option2-moda-{{ $member->id }}-{{ $member->first_name }}l" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Member Information ({{ $member->id }}-{{ $member->first_name }})</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row mb-3">
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Date Accepted</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="date_accepted" name="date_accepted" value="{{ isset($member->profile->date_accepted) ? $member->profile->date_accepted : '' }}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Resolution Number</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="resolution_number" name="resolution_number" value="{{ isset($member->profile->resolution_number) ? $member->profile->resolution_number : ''}}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Membership Type</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="type" name="type" value="{{ isset($member->type->type) ? $member->type->type : '' }}">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Shares Subscribed</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="shares_subscribed" name="shares_subscribed" value="{{ isset($member->profile->shares_subscribed) ? $member->profile->shares_subscribed : ''}}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Amount Subscribed</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="amount_subscribed" name="amount_subscribed" value="{{ isset($member->profile->amount_subscribed) ?$member->profile->amount_subscribed : ''}}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Initial Paid up</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="initial_paid_up" name="initial_paid_up" value="{{ isset($member->profile->initial_paid_up) ? $member->profile->initial_paid_up : '' }}">
                                </div>
                              </div>

                              <hr />

                              <div class="row mb-3">
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Address</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="address" name="address" value="{{ isset($member->details->address) ? $member->details->address : ''}}" disabled="{{ isset($member->details->address) ? true : false }}">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col form-group">
                                  <label for="exampleInputEmail1" class="form-label"><b>Date of Birth</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="date_of_birth" name="date_of_birth" value="{{ isset($member->details->date_of_birth) ? $member->details->date_of_birth : '' }}" disabled="{{ isset($member->details->date_of_birth) ? true : false }}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Age</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="age" name="age" value="{{ isset($member->details->age) ? $member->details->age : '' }}" disabled="{{ isset($member->details->age) ? true : false }}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Gender</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="gender" name="gender" value="{{ isset($member->details->gender) ? $member->details->gender : '' }}" disabled="{{ isset($member->details->gender) ? true : false }}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Civil Status</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="civil_status" name="civil_status" value="{{ isset($member->details->civil_status) ? $member->details->civil_status : '' }}" disabled="{{ isset($member->details->civil_status) ? true : false }}">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Educational Attainment</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="educational_attainment" name="educational_attainment" value="{{ isset($member->details->educational_attainment) ? $member->details->educational_attainment : '' }}" disabled="{{ isset($member->details->educational_attainment) ? true : false }}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Occupation</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="occupation" name="occupation" value="{{ isset($member->details->occupation) ? $member->details->occupation : '' }}" disabled="{{ isset($member->details->occupation) ? true : false }}">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-2">
                                  <label for="exampleInputEmail1" class="form-label"><b>Dependents</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="dependents" name="dependents" value="{{ isset($member->details->dependents) ? $member->details->dependents : '' }}" disabled="{{ isset($member->details->dependents) ? true : false }}">
                                </div>
                                <div class="col-6">
                                  <label for="exampleInputEmail1" class="form-label"><b>Annual Income</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="annual_income" name="annual_income" value="{{ isset($member->details->annual_income) ? $member->details->annual_income : '' }}" disabled="{{ isset($member->details->annual_income) ? true : false }}">
                                </div>
                                <div class="col">
                                  <label for="exampleInputEmail1" class="form-label"><b>Religion</b></label>
                                  <input type="text" readonly class="form-control-plaintext" id="religion" name="religion" value="{{ isset($member->details->religion) ? $member->details->religion : '' }}" disabled="{{ isset($member->details->religion) ? true : false }}">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal View end-->

                      <!-- Modal Delete and delete confirm start-->

                      <div class="modal fade" id="option3-modal-{{ $member->id }}" tabindex="-1" aria-labelledby="option3-modal-{{ $member->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header bg-danger">
                              <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to terminate <br />
                              {{ $member->first_name }} {{ $member->last_name }}'s records permanenty?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                              <a href="/removeMember/{{ $member->id }}" type="button" class="btn btn-danger">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!---==================================================================================foreach modals end here======================================================================-->
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <script type="text/javascript">
    $(document).ready(function() {
      $('#table_id').DataTable();

    });
    $('#table_id').dataTable({
      "pageLength": 5,
      "lengthMenu": [
        [5, 10, 15],
        [5, 10, 15]
      ]
    });
  </script>
</main><!-- End #main -->