<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text"
    name="name" id="name"
    class="form-control @error('name') is-invalid  @enderror"
    placeholder=""  aria-describedby="helpId">
      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>
                  {{ $message }}
              </strong>
          </span>
      @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Descripcion</label>
    <textarea class="form-control @error('description') is-invalid  @enderror" name="description" id="description" rows="3"></textarea>
    @error('description')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
  @enderror
  </div>
