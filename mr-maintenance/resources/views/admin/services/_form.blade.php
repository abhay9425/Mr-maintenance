<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label fw-600">Service Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $service->name ?? '') }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-600">Category <span class="text-danger">*</span></label>
        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
            @foreach(['electrical','plumbing','carpentry','appliance','general'] as $cat)
            <option value="{{ $cat }}" {{ old('category', $service->category ?? '') === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-600">Price (₹) <span class="text-danger">*</span></label>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
            value="{{ old('price', $service->price ?? '') }}" min="0" step="0.01" required>
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-600">Icon Class (Font Awesome)</label>
        <input type="text" name="icon_class" class="form-control"
            value="{{ old('icon_class', $service->icon_class ?? 'fas fa-tools') }}" placeholder="fas fa-bolt">
        <div class="form-text">e.g. fas fa-bolt, fas fa-faucet, fas fa-hammer</div>
    </div>
    <div class="col-12">
        <label class="form-label fw-600">Description</label>
        <textarea name="description" class="form-control" rows="3"
            placeholder="Service description...">{{ old('description', $service->description ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-600" for="is_active">Active (visible on site)</label>
        </div>
    </div>
</div>
