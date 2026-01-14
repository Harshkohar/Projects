import React, { useState, useEffect } from 'react';
import { Plus, MapPin, Search, Heart, Users, Shield, Menu, X, Star, Clock, Package } from 'lucide-react';

// Mock data for demo
const mockMedicines = [
  {
    id: 1,
    name: "Paracetamol",
    brand: "Crocin",
    dosage: "500mg",
    quantity: 20,
    expiryDate: "2025-12-15",
    condition: "Unopened",
    location: "Sector 15, Noida",
    distance: "2.3 km",
    donor: "Rahul Sharma",
    image: "/api/placeholder/300/200",
    category: "Pain Relief"
  },
  {
    id: 2,
    name: "Amoxicillin",
    brand: "Novamox",
    dosage: "250mg",
    quantity: 15,
    expiryDate: "2025-08-20",
    condition: "Unopened",
    location: "Connaught Place, Delhi",
    distance: "5.1 km",
    donor: "Priya Patel",
    image: "/api/placeholder/300/200",
    category: "Antibiotic"
  },
  {
    id: 3,
    name: "Insulin",
    brand: "Lantus",
    dosage: "100 units/ml",
    quantity: 3,
    expiryDate: "2025-06-10",
    condition: "Unopened",
    location: "Lajpat Nagar, Delhi",
    distance: "7.8 km",
    donor: "Dr. Amit Singh",
    image: "/api/placeholder/300/200",
    category: "Diabetes"
  }
];

const mockUsers = [
  { id: 1, name: "Rahul Sharma", email: "rahul@email.com", type: "donor", donations: 5 },
  { id: 2, name: "Priya Patel", email: "priya@email.com", type: "recipient", claims: 3 },
  { id: 3, name: "Care Foundation", email: "care@ngo.org", type: "ngo", claims: 15 }
];

const App = () => {
  const [currentPage, setCurrentPage] = useState('home');
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [userType, setUserType] = useState('');
  const [user, setUser] = useState(null);
  const [medicines, setMedicines] = useState(mockMedicines);
  const [searchTerm, setSearchTerm] = useState('');
  const [selectedMedicine, setSelectedMedicine] = useState(null);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  const handleLogin = (email, password, type) => {
    // Mock login logic
    setIsLoggedIn(true);
    setUserType(type);
    setUser({ name: "Demo User", email, type });
    setCurrentPage('dashboard');
  };

  const handleLogout = () => {
    setIsLoggedIn(false);
    setUserType('');
    setUser(null);
    setCurrentPage('home');
  };

  const Navigation = () => (
    <nav className="bg-white shadow-lg border-b-2 border-blue-100">
      <div className="max-w-7xl mx-auto px-4">
        <div className="flex justify-between items-center py-4">
          <div className="flex items-center space-x-2">
            <div className="bg-gradient-to-r from-blue-600 to-green-600 p-2 rounded-lg">
              <Heart className="w-6 h-6 text-white" />
            </div>
            <span className="text-2xl font-bold bg-gradient-to-r from-blue-600 to-green-600 bg-clip-text text-transparent">
              Medicine Near Me
            </span>
          </div>

          {/* Desktop Menu */}
          <div className="hidden md:flex items-center space-x-6">
            <button
              onClick={() => setCurrentPage('home')}
              className={`px-4 py-2 rounded-lg transition-all ${currentPage === 'home' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
            >
              Home
            </button>
            <button
              onClick={() => setCurrentPage('browse')}
              className={`px-4 py-2 rounded-lg transition-all ${currentPage === 'browse' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
            >
              Browse Medicines
            </button>
            {isLoggedIn ? (
              <>
                <button
                  onClick={() => setCurrentPage('dashboard')}
                  className={`px-4 py-2 rounded-lg transition-all ${currentPage === 'dashboard' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
                >
                  Dashboard
                </button>
                {userType === 'admin' && (
                  <button
                    onClick={() => setCurrentPage('admin')}
                    className={`px-4 py-2 rounded-lg transition-all ${currentPage === 'admin' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
                  >
                    Admin Panel
                  </button>
                )}
                <button
                  onClick={handleLogout}
                  className="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors"
                >
                  Logout
                </button>
              </>
            ) : (
              <button
                onClick={() => setCurrentPage('auth')}
                className="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"
              >
                Login / Register
              </button>
            )}
          </div>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            className="md:hidden p-2"
          >
            {mobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
          </button>
        </div>

        {/* Mobile Menu */}
        {mobileMenuOpen && (
          <div className="md:hidden py-4 border-t">
            <div className="flex flex-col space-y-2">
              <button
                onClick={() => {setCurrentPage('home'); setMobileMenuOpen(false);}}
                className={`px-4 py-2 text-left rounded-lg ${currentPage === 'home' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
              >
                Home
              </button>
              <button
                onClick={() => {setCurrentPage('browse'); setMobileMenuOpen(false);}}
                className={`px-4 py-2 text-left rounded-lg ${currentPage === 'browse' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
              >
                Browse Medicines
              </button>
              {isLoggedIn ? (
                <>
                  <button
                    onClick={() => {setCurrentPage('dashboard'); setMobileMenuOpen(false);}}
                    className={`px-4 py-2 text-left rounded-lg ${currentPage === 'dashboard' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
                  >
                    Dashboard
                  </button>
                  {userType === 'admin' && (
                    <button
                      onClick={() => {setCurrentPage('admin'); setMobileMenuOpen(false);}}
                      className={`px-4 py-2 text-left rounded-lg ${currentPage === 'admin' ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100'}`}
                    >
                      Admin Panel
                    </button>
                  )}
                  <button
                    onClick={() => {handleLogout(); setMobileMenuOpen(false);}}
                    className="bg-red-500 text-white px-4 py-2 text-left rounded-lg hover:bg-red-600 transition-colors"
                  >
                    Logout
                  </button>
                </>
              ) : (
                <button
                  onClick={() => {setCurrentPage('auth'); setMobileMenuOpen(false);}}
                  className="bg-blue-600 text-white px-4 py-2 text-left rounded-lg hover:bg-blue-700 transition-colors"
                >
                  Login / Register
                </button>
              )}
            </div>
          </div>
        )}
      </div>
    </nav>
  );

  const HomePage = () => (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-green-50">
      {/* Hero Section */}
      <div className="bg-gradient-to-r from-blue-600 to-green-600 text-white py-20">
        <div className="max-w-7xl mx-auto px-4 text-center">
          <h1 className="text-5xl font-bold mb-6">
            Transform Unused Medicines into Hope
          </h1>
          <p className="text-xl mb-8 max-w-3xl mx-auto">
            Connect medicine donors with those in need. Every unused medicine can save a life.
            Join our community-driven platform to reduce waste and help the underprivileged.
          </p>
          <div className="flex flex-col sm:flex-row justify-center gap-4">
            <button
              onClick={() => setCurrentPage('auth')}
              className="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
            >
              Donate Medicine
            </button>
            <button
              onClick={() => setCurrentPage('browse')}
              className="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors"
            >
              Find Medicine
            </button>
          </div>
        </div>
      </div>

      {/* Features Section */}
      <div className="py-20">
        <div className="max-w-7xl mx-auto px-4">
          <h2 className="text-4xl font-bold text-center mb-12 text-gray-800">
            How It Works
          </h2>
          <div className="grid md:grid-cols-3 gap-8">
            <div className="text-center p-8 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
              <div className="bg-blue-100 p-4 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center">
                <Plus className="w-8 h-8 text-blue-600" />
              </div>
              <h3 className="text-2xl font-bold mb-4 text-gray-800">Donate</h3>
              <p className="text-gray-600">
                List your unused medicines with details and photos. Set pickup location for easy collection.
              </p>
            </div>
            <div className="text-center p-8 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
              <div className="bg-green-100 p-4 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center">
                <Search className="w-8 h-8 text-green-600" />
              </div>
              <h3 className="text-2xl font-bold mb-4 text-gray-800">Search</h3>
              <p className="text-gray-600">
                Find medicines near you using our smart search and map integration.
              </p>
            </div>
            <div className="text-center p-8 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
              <div className="bg-purple-100 p-4 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center">
                <Heart className="w-8 h-8 text-purple-600" />
              </div>
              <h3 className="text-2xl font-bold mb-4 text-gray-800">Help</h3>
              <p className="text-gray-600">
                Connect directly with donors and claim medicines to help those in need.
              </p>
            </div>
          </div>
        </div>
      </div>

      {/* Stats Section */}
      <div className="bg-white py-16">
        <div className="max-w-7xl mx-auto px-4">
          <div className="grid md:grid-cols-4 gap-8 text-center">
            <div>
              <div className="text-4xl font-bold text-blue-600 mb-2">500+</div>
              <div className="text-gray-600">Medicines Donated</div>
            </div>
            <div>
              <div className="text-4xl font-bold text-green-600 mb-2">200+</div>
              <div className="text-gray-600">Lives Helped</div>
            </div>
            <div>
              <div className="text-4xl font-bold text-purple-600 mb-2">50+</div>
              <div className="text-gray-600">Active Donors</div>
            </div>
            <div>
              <div className="text-4xl font-bold text-orange-600 mb-2">25+</div>
              <div className="text-gray-600">Partner NGOs</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );

  const AuthPage = () => {
    const [isLogin, setIsLogin] = useState(true);
    const [formData, setFormData] = useState({
      email: '',
      password: '',
      name: '',
      phone: '',
      userType: 'donor',
      address: ''
    });

    const handleSubmit = (e) => {
      e.preventDefault();
      handleLogin(formData.email, formData.password, formData.userType);
    };

    return (
      <div className="min-h-screen bg-gradient-to-br from-blue-50 to-green-50 flex items-center justify-center py-12 px-4">
        <div className="max-w-md w-full bg-white rounded-xl shadow-2xl p-8">
          <div className="text-center mb-8">
            <div className="bg-gradient-to-r from-blue-600 to-green-600 p-3 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
              <Heart className="w-8 h-8 text-white" />
            </div>
            <h2 className="text-3xl font-bold text-gray-800">
              {isLogin ? 'Welcome Back' : 'Join Us'}
            </h2>
            <p className="text-gray-600 mt-2">
              {isLogin ? 'Sign in to your account' : 'Create your account'}
            </p>
          </div>

          <form onSubmit={handleSubmit} className="space-y-6">
            {!isLogin && (
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">
                  Full Name
                </label>
                <input
                  type="text"
                  required
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  value={formData.name}
                  onChange={(e) => setFormData({...formData, name: e.target.value})}
                />
              </div>
            )}

            <div>
              <label className="block text-sm font-medium text-gray-700 mb-2">
                Email Address
              </label>
              <input
                type="email"
                required
                className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                value={formData.email}
                onChange={(e) => setFormData({...formData, email: e.target.value})}
              />
            </div>

            <div>
              <label className="block text-sm font-medium text-gray-700 mb-2">
                Password
              </label>
              <input
                type="password"
                required
                className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                value={formData.password}
                onChange={(e) => setFormData({...formData, password: e.target.value})}
              />
            </div>

            {!isLogin && (
              <>
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">
                    Phone Number
                  </label>
                  <input
                    type="tel"
                    required
                    className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value={formData.phone}
                    onChange={(e) => setFormData({...formData, phone: e.target.value})}
                  />
                </div>

                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">
                    I am a
                  </label>
                  <select
                    className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value={formData.userType}
                    onChange={(e) => setFormData({...formData, userType: e.target.value})}
                  >
                    <option value="donor">Medicine Donor</option>
                    <option value="recipient">Individual in Need</option>
                    <option value="ngo">NGO/Organization</option>
                  </select>
                </div>

                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">
                    Address
                  </label>
                  <textarea
                    required
                    className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    rows='2'
                    value={formData.address}
                    onChange={(e) => setFormData({...formData, address: e.target.value})}
                  />
                </div>
              </>
            )}

            <button
              type="submit"
              className="w-full bg-gradient-to-r from-blue-600 to-green-600 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-green-700 transition-colors"
            >
              {isLogin ? 'Sign In' : 'Create Account'}
            </button>
          </form>

          <div className="mt-6 text-center">
            <button
              onClick={() => setIsLogin(!isLogin)}
              className="text-blue-600 hover:text-blue-700 font-medium"
            >
              {isLogin ? "Don't have an account? Sign up" : "Already have an account? Sign in"}
            </button>
          </div>
        </div>
      </div>
    );
  };

  const BrowsePage = () => {
    const filteredMedicines = medicines.filter(medicine =>
      medicine.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      medicine.brand.toLowerCase().includes(searchTerm.toLowerCase()) ||
      medicine.category.toLowerCase().includes(searchTerm.toLowerCase())
    );

    return (
        {selectedMedicine && (
          <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div className="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
              <div className="p-6">
                <div className="flex justify-between items-start mb-6">
                  <h2 className="text-2xl font-bold text-gray-800">Medicine Details</h2>
                  <button
                    onClick={() => setSelectedMedicine(null)}
                    className="text-gray-400 hover:text-gray-600"
                  >
                    <X className="w-6 h-6" />
                  </button>
                </div>
                <div className="grid md:grid-cols-2 gap-6">
                  <div>
                    <div className="h-64 bg-gray-200 rounded-lg mb-4"></div>
                    <div className="space-y-4">
                      <div>
                        <h3 className="font-semibold text-gray-800 mb-2">Medicine Information</h3>
                        <div className="space-y-2 text-sm">
                          <div className="flex justify-between">
                            <span className="text-gray-600">Name:</span>
                            <span className="font-medium">{selectedMedicine?.name}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Brand:</span>
                            <span className="font-medium">{selectedMedicine?.brand}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Dosage:</span>
                            <span className="font-medium">{selectedMedicine?.dosage}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Quantity:</span>
                            <span className="font-medium">{selectedMedicine?.quantity} units</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Expiry Date:</span>
                            <span className="font-medium">{selectedMedicine?.expiryDate}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Condition:</span>
                            <span className="font-medium text-green-600">{selectedMedicine?.condition}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div className="space-y-4">
                      <div>
                        <h3 className="font-semibold text-gray-800 mb-2">Donor Information</h3>
                        <div className="bg-gray-50 p-4 rounded-lg">
                          <div className="flex items-center mb-3">
                            <div className="w-12 h-12 bg-gray-300 rounded-full mr-3"></div>
                            <div>
                              <h4 className="font-medium text-gray-800">{selectedMedicine?.donor}</h4>
                              <div className="flex items-center">
                                <Star className="w-4 h-4 text-yellow-500 mr-1" />
                                <span className="text-sm text-gray-600">4.8 rating</span>
                              </div>
                            </div>
                          </div>
                          <div className="flex items-center text-sm text-gray-600">
                            <MapPin className="w-4 h-4 mr-1" />
                            {selectedMedicine?.location}
                          </div>
                        </div>
                      </div>
                      <div>
                        <h3 className="font-semibold text-gray-800 mb-2">Location & Distance</h3>
                        <div className="bg-blue-50 p-4 rounded-lg">
                          <div className="text-sm text-gray-600 mb-2">Distance from you</div>
                          <div className="text-2xl font-bold text-blue-600">{selectedMedicine?.distance}</div>
                        </div>
                      </div>
                      <div className="space-y-3">
                        {isLoggedIn ? (
                          <>
                            <button className="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                              Claim This Medicine
                            </button>
                            <button className="w-full border border-blue-600 text-blue-600 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                              Contact Donor
                            </button>
                          </>
                        ) : (
                          <div className="text-center p-4 bg-gray-50 rounded-lg">
                            <p className="text-gray-600 mb-3">Please login to claim this medicine</p>
                            <button
                              onClick={() => setCurrentPage('auth')}
                              className="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"
                            >
                              Login / Register
                            </button>
                          </div>
                        )}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )}
                        <h3 className="font-semibold text-gray-800 mb-2">Medicine Information</h3>
                        <div className="space-y-2 text-sm">
                          <div className="flex justify-between">
                            <span className="text-gray-600">Name:</span>
                            <span className="font-medium">{selectedMedicine.name}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Brand:</span>
                            <span className="font-medium">{selectedMedicine.brand}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Dosage:</span>
                            <span className="font-medium">{selectedMedicine.dosage}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Quantity:</span>
                            <span className="font-medium">{selectedMedicine.quantity} units</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Expiry Date:</span>
                            <span className="font-medium">{selectedMedicine.expiryDate}</span>
                          </div>
                          <div className="flex justify-between">
                            <span className="text-gray-600">Condition:</span>
                            <span className="font-medium text-green-600">{selectedMedicine.condition}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div>
                    <div className="space-y-4">
                      <div>
                        <h3 className="font-semibold text-gray-800 mb-2">Donor Information</h3>
                        <div className="bg-gray-50 p-4 rounded-lg">
                          <div className="flex items-center mb-3">
                            <div className="w-12 h-12 bg-gray-300 rounded-full mr-3"></div>
                            <div>
                              <h4 className="font-medium text-gray-800">{selectedMedicine.donor}</h4>
                              <div className="flex items-center">
                                <Star className="w-4 h-4 text-yellow-500 mr-1" />
                                <span className="text-sm text-gray-600">4.8 rating</span>
                              </div>
                            </div>
                          </div>
                          <div className="flex items-center text-sm text-gray-600">
                            <MapPin className="w-4 h-4 mr-1" />
                            {selectedMedicine.location}
                          </div>
                        </div>
                      </div>

                      <div>
                        <h3 className="font-semibold text-gray-800 mb-2">Location & Distance</h3>
                        <div className="bg-blue-50 p-4 rounded-lg">
                          <div className="text-sm text-gray-600 mb-2">Distance from you</div>
                          <div className="text-2xl font-bold text-blue-600">{selectedMedicine.distance}</div>
                        </div>
                      </div>

                      <div className="space-y-3">
                        {isLoggedIn ? (
                          <>
                            <button className="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                              Claim This Medicine
                            </button>
                            <button className="w-full border border-blue-600 text-blue-600 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                              Contact Donor
                            </button>
                          </>
                        ) : (
                          <div className="text-center p-4 bg-gray-50 rounded-lg">
                            <p className="text-gray-600 mb-3">Please login to claim this medicine</p>
                            <button
                              onClick={() => setCurrentPage('auth')}
                              className="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"