# Project Cleanup Guide

## 🗑️ Files and Folders to DELETE

### 1. Large Unnecessary Folders (SAFE TO DELETE)

#### `docs/` folder - **DELETE ENTIRELY**
This folder contains:
- Full Bootstrap 5.3.6 distribution (not used - we use CDN)
- Full FontAwesome 6.7.2 with 2060 SVG files (not used - we use CDN)
- **Estimated size: 50-100MB**

**Why safe to delete:**
- We're using CDN versions of Bootstrap and FontAwesome
- These are just documentation/source files
- Not referenced anywhere in the code

#### `layout/layout/` folder - **DELETE ENTIRELY**
This folder contains:
- Full jQuery UI source code with demos and tests
- Full SelectBoxIt source code with demos and tests
- **Estimated size: 10-20MB**

**Why safe to delete:**
- We only need the minified CSS/JS files
- Source files, demos, and tests are not needed
- Already have minified versions in `layout/css/` and `layout/js/`

#### `admin/layout/layout/` folder - **DELETE ENTIRELY**
- Same as above, completely duplicated
- **Estimated size: 10-20MB**

### 2. ZIP Files (SAFE TO DELETE)

Delete these ZIP files (already extracted):
- `layout/gfranko-jquery.selectBoxIt.js-v3.8.2-1-g648c62a.zip`
- `layout/jquery-ui-1.14.1.custom.zip`
- `admin/layout/gfranko-jquery.selectBoxIt.js-v3.8.2-1-g648c62a.zip`
- `admin/layout/jquery-ui-1.14.1.custom.zip`

**Estimated size: 5-10MB**

### 3. Optional: Unused Library Files

If you want to go full CDN (recommended), you can also delete:
- `layout/css/bootstrap.min.css` (using CDN)
- `layout/css/fontawesome.min.css` (using CDN)
- `layout/js/bootstrap.bundle.min.js` (using CDN)
- `layout/js/jquery-3.7.1.min.js` (using CDN)
- `admin/layout/css/bootstrap.min.css` (using CDN)
- `admin/layout/js/bootstrap.bundle.min.js` (using CDN)
- `admin/layout/js/jquery-3.7.1.min.js` (using CDN)

**Note:** Keep jQuery UI and SelectBoxIt local files as they're not commonly on CDN.

## 📋 Cleanup Steps

### Windows (PowerShell)
```powershell
# Navigate to project directory
cd D:\installed\xampp2\htdocs\eCommerce

# Delete docs folder
Remove-Item -Recurse -Force docs

# Delete layout/layout folder
Remove-Item -Recurse -Force layout\layout

# Delete admin/layout/layout folder
Remove-Item -Recurse -Force admin\layout\layout

# Delete ZIP files
Remove-Item layout\*.zip
Remove-Item admin\layout\*.zip
```

### Windows (File Explorer)
1. Navigate to project folder
2. Delete `docs` folder
3. Delete `layout\layout` folder
4. Delete `admin\layout\layout` folder
5. Delete all `.zip` files in `layout\` and `admin\layout\`

### Linux/Mac
```bash
cd /path/to/eCommerce

# Delete folders
rm -rf docs/
rm -rf layout/layout/
rm -rf admin/layout/layout/

# Delete ZIP files
rm layout/*.zip
rm admin/layout/*.zip
```

## ✅ What's Already Fixed

1. ✅ Removed duplicate Bootstrap loading (was loading 3 times)
2. ✅ Removed duplicate jQuery loading (was loading from CDN + local)
3. ✅ Removed duplicate FontAwesome loading (was loading from CDN + local)
4. ✅ Fixed broken empty script tag in footer
5. ✅ Removed hardcoded localhost URLs (now using relative paths)
6. ✅ Removed commented code from headers
7. ✅ Added proper page titles

## 📊 Expected Size Reduction

- **Before cleanup**: ~150-200MB
- **After cleanup**: ~50-75MB
- **Reduction**: ~75-150MB (50-75% smaller!)

## ⚠️ Important Notes

1. **Test your site** after cleanup to ensure everything still works
2. **Backup first** if you're unsure
3. The `docs/` folder is definitely safe to delete
4. The `layout/layout/` folders are safe to delete (source files only)
5. ZIP files are safe to delete (already extracted)

## 🔍 Verification

After cleanup, verify:
- [ ] Website loads correctly
- [ ] All CSS styles work
- [ ] All JavaScript functions work
- [ ] Admin panel works
- [ ] No 404 errors in browser console
