<section class="space-y-3">
  
        <div>
          <h5 class=" text-lg font-medium">Delete Akun</h5>
       
          <button class="btn btn-danger mt-2 col-lg-3 col-sm-12 col-md-12" type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">Delete Akun</button>

          <div class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Akun</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Apa anda yakin menghapus Akun anda?
                <p>saat anda menekan tombol Delete di bawah ini akun dan semua unggahan anda akan di hapus secara permanen</p>  
                </div>
                <div class="modal-footer confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                  <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')
                    <div class="mt-6 row" style="text-align: center;">
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"required>
                            <div class="invalid-feedback">Enter Your Password For Confirmation</div>
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>
                        <div class="mt-6 flex justify-end">
                          <button class="btn btn-secondary mt-2 col-lg-12 col-sm-12 col-md-12" data-bs-dismiss="modal">Cancel</button>
                          <button class="btn btn-danger mt-2 col-lg-12 col-sm-12 col-md-12" type="submit" name="submit">Delete</button>
                      </div>
                    </div>
                    
                </form>
                </div>
              </div>
            </div>
          </div><!-- End Vertically centered Modal-->

        </div>
     
</section>

