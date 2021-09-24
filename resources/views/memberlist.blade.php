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
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Tin</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($members as $member)
                  @if(isset($member->details))
                  <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->middle_name }}</td>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->tax_identification_number }}</td>
                    <td><button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#option-modal">option</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->